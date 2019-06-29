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
        $txt1 = "新規会員登録がありました。\n";
        $txt2 = "会員名:" . $request->name . "\n 紹介者:";
        $txt3 = $request->introduce ? $request->introduce . "\n" : "なし\n";
        $txt4 = "メールアドレス:" . $request->email;
        $message = [
            'name' => $request->name,
            'introduce' => $request->introduce,
            'email' => $request->email,
            'url' => route('admin.users.show', [
                'id' => $user->id
            ])
        ];
        $this->SlackRepository->notify(new Slack($message));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
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
}
