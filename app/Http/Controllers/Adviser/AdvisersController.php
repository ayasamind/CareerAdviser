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
use Illuminate\Support\Facades\DB;


class AdvisersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * edit
     * アドバイザー編集画面
     * @author ayasamind
     * @return array
    */
    public function edit()
    {
        $adviser = Adviser::with(['AdviserProfile'])->findOrFail(Auth::user()->id);
        $prefectures = Adviser::getPrefectureList();
        return view('adviser.advisers.edit', [
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
}
