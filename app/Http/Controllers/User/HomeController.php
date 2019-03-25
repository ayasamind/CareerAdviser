<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\User\UsersController;
use App\Adviser;
use Illuminate\Support\Facades\Auth;

class HomeController extends UsersController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advisers = Adviser::paginate(10);
        return view('user.index', [
            'advisers' => $advisers
        ]);
    }

    public function settings()
    {
        $user = Auth::user();
        return view('user.settings', [
            'user' => $user
        ]);
    }
}
