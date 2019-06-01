<?php

namespace App\Http\Controllers\Admin;

use App\Adviser;
use App\AdviserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Requests\Common\AdviserRequest;
use App\Http\Requests\Adviser\AdviserProfileRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewAdviserMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
    public function update(AdviserProfileRequest $request, $adviserId)
    {
        $adviser = Adviser::findOrFail($adviserId);
        DB::transaction(function () use ($request, $adviser) {
            $photo_url = null;
            if ($request->file('AdviserProfile.photo')) {
                try {
                    $path = Storage::disk('s3')->putFile('advisers', $request->file('AdviserProfile.photo'), 'public');
                    $photo_url = Storage::disk('s3')->url($path);
                } catch (\Exception $e) {
                    return response(['message' => $e->getMessage()], 500);
                }
            }
            return $this->updateAdviser($request->all(), $photo_url, $adviser);
        });

        return redirect()->route('admin.advisers.index')
            ->with('success', 'アドバイザー情報を編集しました');
    }

    private function updateAdviser($data, $photo_url, $adviser)
    {
        $adviser->name = $data['name'];
        $adviser->email = $data['email'];
        $adviser->save();

        $profile = AdviserProfile::where(['adviser_id' => $adviser->id])->first();
        if ($profile) {
            $profile->photo_url = $photo_url ? $photo_url : $profile->photo_url;
            $profile->gender = $data['AdviserProfile']['gender'];
            $profile->prefecture_id = $data['AdviserProfile']['prefecture_id'];
            $profile->comment = $data['AdviserProfile']['comment'];
            $profile->introduce = $data['AdviserProfile']['introduce'];
            $profile->industry = $data['AdviserProfile']['industry'];
            $profile->company_number = $data['AdviserProfile']['company_number'];
            $profile->place = $data['AdviserProfile']['place'];
            $profile->performance = $data['AdviserProfile']['performance'];
        } else {
            $profile = new AdviserProfile([
                'adviser_id'     => $adviser['id'],
                'photo_url'      => $photo_url,
                'gender'         => $data['AdviserProfile']['gender'],
                'prefecture_id'  => $data['AdviserProfile']['prefecture_id'],
                'comment'        => $data['AdviserProfile']['comment'],
                'introduce'      => $data['AdviserProfile']['introduce'],
                'industry'       => $data['AdviserProfile']['industry'],
                'company_number' => $data['AdviserProfile']['company_number'],
                'place'          => $data['AdviserProfile']['place'],
                'performance'    => $data['AdviserProfile']['performance'],
            ]);
        }
        $profile->save();
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
