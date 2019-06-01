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
    }

     /**
     * index
     * アドバイザー一覧画面
     * @author ayasamind
    */
    public function index()
    {
        $advisers = Adviser::whereHas('AdviserProfile')->orderByDesc('created_at')->paginate(10);
        return view('user.advisers.index', [
            'advisers' => $advisers
        ]);
    }

    /**
     * show
     * アドバイザー詳細画面
     * @author ayasamind
    */
    public function show($id)
    {
        $adviser = Adviser::with(['AdviserProfile'])->findOrFail($id);
        if (!$adviser->AdviserProfile) {
            abort(404);
        }
        return view('user.advisers.show', [
            'adviser' => $adviser
        ]);
    }
}
