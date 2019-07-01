<?php

namespace App\Http\Controllers\Adviser;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Adviser\AdviserProfileRequest;
use App\Adviser;
use Illuminate\Support\Facades\Storage;
use App\Enums\Prefecture;
use App\AdviserProfile;
use App\AdviserCareer;
use App\Tag;
use Illuminate\Support\Facades\DB;
use App\Repositories\Adviser\AdviserInterface;
use App\Http\Requests\Adviser\UpdatePasswordRequest;

class AdvisersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $AdviserUtils = null;

    public function __construct(AdviserInterface $AdviserUtils)
    {
        $this->AdviserUtils = $AdviserUtils;
    }

    /**
     * edit
     * アドバイザー編集画面
     * @author ayasamind
     * @return array
    */
    public function edit()
    {
        $adviser = Adviser::with(['AdviserProfile', 'AdviserCareer'])->findOrFail(Auth::user()->id);
        $prefectures = Adviser::getPrefectureList();
        $tags = Tag::all();
        return view('adviser.advisers.edit', [
            'adviser' => $adviser,
            'prefectures' => $prefectures,
            'tags' => $tags
        ]);
    }

    /**
     * update
     * アドバイザー更新
     * @author ayasamind
     * @return array
    */
    public function update(AdviserProfileRequest $request)
    {
        DB::transaction(function () use ($request) {
            $photo_url = null;
            if ($request->file('AdviserProfile.photo')) {
                try {
                    $path = Storage::disk('s3')->putFile('advisers', $request->file('AdviserProfile.photo'), 'public');
                    $photo_url = Storage::disk('s3')->url($path);
                } catch (\Exception $e) {
                    return response(['message' => $e->getMessage()], 500);
                }
            }
            $adviser = Auth::user();
            return $this->updateAdviser($request->all(), $photo_url, $adviser);
        });

        return redirect()->route('adviser.home')
            ->with('success', 'ユーザー情報を編集しました');
    }

    private function updateAdviser($data, $photo_url, $adviser)
    {
        $adviser->name = $data['name'];
        $adviser->email = $data['email'];
        $adviser->save();

        $this->AdviserUtils->saveProfile($adviser, $data, $photo_url);
        $this->AdviserUtils->saveCareers($adviser, $data);
        $this->AdviserUtils->saveTags($adviser, $data);
    }

    public function changePassword()
    {
        return view('adviser.advisers.password');
    }

    public function updtePassword(UpdatePasswordRequest $request)
    {
        $adviser = Auth::user();
        $adviser->password = bcrypt($request->password);
        $adviser->update();
        return redirect()->route('adviser.home')
            ->with('success', 'パスワードを編集しました');
    }
}
