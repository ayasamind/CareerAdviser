<?php

namespace App\Http\Controllers\Adviser\Auth;

use App\Http\Controllers\Adviser\AdvisersController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends AdvisersController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/adviser';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:adviser')->except('logout');
    }

    public function showLoginForm()
    {
        if (Auth::guard('adviser')->check()) {
            return redirect('/adviser/home');
        }
        return view('adviser.auth.login');
    }

    protected function guard()
    {
        return \Auth::guard('adviser');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/adviser/login');
    }
}
