<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminsController;

class UsersController extends AdminsController
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * index
     * ユーザー一覧画面
     * @author ayasamind
     * @return array
    */
    public function index()
    {
        $users = User::orderByDesc('created_at')->paginate(10);
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * show
     * ユーザー細画面
     * @author ayasamind
     * @return array
    */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    /**
     * destroy
     * ユーザー削除
     * @author ayasamind
     * @return array
    */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect()
            ->route('admin.users.index')
            ->with('success', $user->name . 'を削除しました');
    }
}
