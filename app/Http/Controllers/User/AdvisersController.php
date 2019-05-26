<?php

namespace App\Http\Controllers\User;

use App\Adviser;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Requests\Common\AdviserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewAdviserMail;
use Illuminate\Support\Facades\DB;

class AdvisersController extends UsersController
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    /**
     * index
     * アドバイザー詳細画面
     * @author ayasamind
     * @return array
    */
    public function show($id)
    {
        $adviser = Adviser::findOrFail($id);
        return view('user.advisers.show', [
            'adviser' => $adviser
        ]);
    }
}
