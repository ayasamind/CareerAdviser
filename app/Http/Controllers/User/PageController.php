<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\UsersController;
use App\Adviser;

class PageController extends UsersController
{
    public function __construct()
    {
    }

    public function top()
    {
        $advisers = Adviser::public()->whereHas('AdviserProfile')->orderByDesc('created_at')->paginate(15);
        return view('top', [
            'advisers' => $advisers,
        ]);
    }

    public function company()
    {
        return view('user.company');
    }
}
