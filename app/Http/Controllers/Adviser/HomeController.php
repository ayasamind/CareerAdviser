<?php

namespace App\Http\Controllers\Adviser;

use Illuminate\Http\Request;
use App\Http\Controllers\Adviser\AdvisersController;
use Illuminate\Support\Facades\Auth;

class HomeController extends AdvisersController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:adviser');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adviser = Auth::user();
        return view('adviser.home', [
            'adviser' => $adviser
        ]);
    }
}
