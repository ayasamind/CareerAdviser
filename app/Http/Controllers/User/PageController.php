<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\UsersController;

class PageController extends UsersController
{
    public function __construct()
    {
    }

    public function company()
    {
        return view('user.company');
    }
}
