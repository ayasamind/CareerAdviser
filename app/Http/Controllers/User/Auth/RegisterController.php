<?php

namespace App\Http\Controllers\User\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\User\UsersController;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Slack;
use App\Repositories\Slack\SlackRepositoryInterface;
use Socialite;
use App\UserProfile;
use Illuminate\Support\Facades\DB;

class RegisterController extends UsersController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/thanks';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SlackRepositoryInterface $SlackRepository)
    {
        $this->middleware('guest:user');
        $this->SlackRepository = $SlackRepository;
    }

     /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $this->afterRegistered($request->all(), $user);
        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    private function afterRegistered($data, $user, $client = null)
    {
        $txt1 = "新規会員登録がありました。\n";
        $txt2 = "会員名:" . $data['name'] . "\n 紹介者:";
        $txt3 = $data['introduce'] ? $data['introduce'] . "\n" : "なし\n";
        $txt4 = "メールアドレス:" . $data['email'];
        $message = [
            'name' => $data['name'],
            'introduce' => $data['introduce'],
            'email' => $data['email'],
            'url' => route('admin.users.show', [
                'id' => $user->id
            ]),
            'client' => $client,
            'twitter_id' => $user->twitter_id
        ];
        $this->SlackRepository->notify(new Slack($message));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        return view('user.auth.register');
    }

    // Twitterログイン
    public function redirectToProvider(){
        return Socialite::driver('twitter')->redirect();
    }

    // Twitterコールバック
    public function handleProviderCallback(){
        try {
            $twitterUser = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter');
        }
        $authUser = User::where('email', $twitterUser->email)->first();
        if ($authUser) {
            Auth::login($authUser, true);
            return redirect('/mypage')->with('success', 'ログインしました');
        } else {
            $user = $this->createUserByTwitter($twitterUser);
            Auth::login($user, true);
            return redirect('/thanks');
        }
    }

    private function createUserByTwitter($twitterUser)
    {
        $data = [
            'name' => $twitterUser->name,
            'email' => $twitterUser->email,
            'twitter_id' => $twitterUser->id,
            'photo_url' => $twitterUser->avatar_original,
            'introduce' => null
        ];
        event(new Registered($user = $this->twitterCreate($data)));
        $this->afterRegistered($data, $user, 'Twitter');
        return $user;
    }

    protected function twitterCreate(array $data)
    {
        $user = DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'twitter_id' => $data['twitter_id']
            ]);
            UserProfile::create([
                'user_id' => $user->id,
                'photo_url' => $data['photo_url'],
            ]);
            return $user;
        });
        return $user;
    }
}
