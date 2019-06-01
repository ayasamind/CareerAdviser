<?php

namespace App\Http\Controllers\Admin;

use App\Adviser;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Requests\Common\AdviserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewAdviserMail;
use Illuminate\Support\Facades\DB;

class AdvisersController extends AdminsController
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * index
     * アドバイザー一覧画面
     * @author ayasamind
     * @return array
    */
    public function index()
    {
        $advisers = Adviser::orderByDesc('created_at')->paginate(10);
        return view('admin.advisers.index', [
            'advisers' => $advisers
        ]);
    }

    /**
     * index
     * アドバイザー詳細画面
     * @author ayasamind
     * @return array
    */
    public function show($id)
    {
        $adviser = Adviser::with(['AdviserProfile'])->findOrFail($id);
        return view('admin.advisers.show', [
            'adviser' => $adviser,
        ]);
    }


    /**
     * create
     * アドバイザー新規作成画面
     * @author ayasamind
     * @return array
    */
    public function create()
    {
        return view('admin.advisers.create');
    }

    /**
     * store
     * アドバイザー保存
     * @author ayasamind
     * @return array
    */
    public function store(AdviserRequest $request)
    {
        $adviser = $this->createAdviser($request->all());
        return redirect()->route('admin.advisers.show', [
            'adviser' => $adviser
        ])->with('success', 'アドバイザーを作成しました。アドバイザーはメールを確認してください。');
    }

    protected function createAdviser(array $data)
    {
        $adviser = DB::transaction(function () use ($data) {
            $pass = str_random(6);
            $adviser = Adviser::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($pass),
            ]);
            Mail::to($adviser->email)->send(new NewAdviserMail($adviser, $pass));
            return $adviser;
        });
        return $adviser;
    }

    /**
     * edit
     * アドバイザー編集画面
     * @author ayasamind
     * @return array
    */
    public function edit(Adviser $adviser)
    {
        $prefectures = Adviser::getPrefectureList();
        return view('admin.advisers.edit', [
            'adviser' => $adviser,
            'prefectures' => $prefectures
        ]);
    }

    /**
     * update
     * アドバイザー更新
     * @author ayasamind
     * @return array
    */
    public function update(AdviserRequest $request, Adviser $adviser)
    {
        $adviser->name = $request->name;
        $adviser->email = $request->email;
        $$adviser->save();

        return redirect()->route('admin.advisers.index')
            ->with('success', 'アドバイザーを編集しました');
    }

    /**
     * store
     * アドバイザー削除
     * @author ayasamind
     * @return array
    */
    public function destroy($id)
    {
        $adviser = Adviser::destroy($id);
        return redirect()
            ->route('admin.advisers.index')
            ->with('success', 'アドバイザーを削除しました');
    }
}
