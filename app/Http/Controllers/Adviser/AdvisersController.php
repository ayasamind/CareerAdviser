<?php

namespace App\Http\Controllers\Adviser;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Common\AdviserRequest;
use App\Adviser;
use Illuminate\Support\Facades\Storage;

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
        $adviser = Auth::user();
        return view('adviser.advisers.edit', [
            'adviser' => $adviser
        ]);
    }

    /**
     * update
     * アドバイザー更新
     * @author ayasamind
     * @return array
    */
    public function update(AdviserRequest $request)
    {
        $adviser = Auth::user();
        $adviser->name = $request->name;
        $adviser->email = $request->email;
        if ($request->file('photo')) {
            try {
                $path = Storage::disk('s3')->putFile('advisers', $request->file('photo'), 'public');
                $url = Storage::disk('s3')->url($path);
                $adviser->photo_url = $url;
            } catch (\Exception $e) {
                return response(['message' => $e->getMessage()], 500);
            }
        }
        $adviser->save();

        return redirect()->route('adviser.home')
            ->with('success', 'ユーザー情報を編集しました');
    }
}
