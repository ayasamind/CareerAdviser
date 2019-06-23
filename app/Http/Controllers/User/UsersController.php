<?php

namespace App\Http\Controllers\User;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UpdateUserNameRequest;
use App\Http\Requests\User\UpdateUniversityRequest;
use App\Http\Requests\User\UpdateInformalDecisionRequest;
use App\Http\Requests\User\UpdateDesireRequest;
use App\Http\Requests\User\UserFileUploadRequest;
use App\User;
use App\UserProfile;
use App\Desire;
use Illuminate\Http\Response;
use Carbon\Carbon;
use App\Enums\Traits\GetPrefectureTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, GetPrefectureTrait;

    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function view()
    {
        $user = User::with(['UserProfile'])->findOrFail(Auth::user()->id);
        $prefectures = $this->getPrefectureList();
        $axisList = Desire::where(['type' => Desire::DESIRE_TYPE_AXIS])->pluck('name', 'id');
        $industryList = Desire::where(['type' => Desire::DESIRE_TYPE_INDUSTRY])->pluck('name', 'id');
        $jobList = Desire::where(['type' => Desire::DESIRE_TYPE_JOB])->pluck('name', 'id');
        $prefectureList = Desire::where(['type' => Desire::DESIRE_TYPE_PREFECTURE])->pluck('name', 'id');
        $companyTypeList = Desire::where(['type' => Desire::DESIRE_TYPE_COMPANY_TYPE])->pluck('name', 'id');

        return view('user.users.view', [
            'user' => $user,
            'prefectures' => $prefectures,
            'axisList' => $axisList,
            'industryList' => $industryList,
            'jobList' => $jobList,
            'prefectureList' => $prefectureList,
            'companyTypeList' => $companyTypeList
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.users.edit', [
            'user' => $user
        ]);
    }

    public function update(UserRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('user.settings')
            ->with('success', 'ユーザー情報を編集しました');
    }

    public function uploadPhoto(UserFileUploadRequest $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }

        try {
            $path = Storage::disk('s3')->putFile('users', $request->file('photo'), 'public');
            $photo_url = Storage::disk('s3')->url($path);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 500);
        }

        return response()->json([
            'url' => $photo_url,
            'status' => 'success'
        ], Response::HTTP_OK);
    }

    public function updateUserName(UpdateUserNameRequest $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }
        $this->saveUserNames($request->all());

        return response()->json([
            'message' => 'ユーザー情報を編集しました',
            'status' => 'success'
        ], Response::HTTP_OK);
    }

    private function saveUserNames($data)
    {
        $user = Auth::user();
        $user->name = $data['name'];
        $user->update();

        $profile = UserProfile::where(['user_id' => $user['id']])->first();
        if ($profile) {
            $profile->photo_url = $data['photo_url'];
            $profile->gender = $data['gender'];
            $profile->prefecture_id = $data['prefecture'];
        } else {
            $profile = new UserProfile([
                'user_id'        => $user['id'],
                'photo_url'      => $data['photo_url'],
                'gender'         => $data['gender'],
                'prefecture_id'  => $data['prefecture']
            ]);
        }
        $profile->save();
    }

    public function updateUniversity(UpdateUniversityRequest $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }
        $this->saveUniversities($request->all());

        return response()->json([
            'message' => 'ユーザー情報を編集しました',
            'status' => 'success'
        ], Response::HTTP_OK);
    }

    private function saveUniversities($data)
    {
        $user = Auth::user();
        $profile = UserProfile::where(['user_id' => $user['id']])->first();
        if ($profile) {
            $profile->university = $data['university'];
            $profile->graduate_year = $data['graduate_year'];
            $profile->birthday = Carbon::createFromFormat('d/m/Y', $data['birthday']);
        } else {
            $profile = new UserProfile([
                'user_id'        => $user['id'],
                'university'     => $data['university'],
                'graduate_year'  => $data['graduate_year'],
                'birthday'       => Carbon::createFromFormat('d/m/Y', $data['birthday'])
            ]);
        }
        $profile->save();
    }

    public function updateInformalDecision(UpdateInformalDecisionRequest $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }
        $this->saveInformalDecisions($request->all());

        return response()->json([
            'message' => 'ユーザー情報を編集しました',
            'status' => 'success'
        ], Response::HTTP_OK);
    }

    private function saveInformalDecisions($data)
    {
        $user = Auth::user();
        $profile = UserProfile::where(['user_id' => $user['id']])->first();
        if ($profile) {
            $profile->informal_decision = $data['informal_decision'];
            $profile->situation = $data['situation'];
        } else {
            $profile = new UserProfile([
                'user_id'           => $user['id'],
                'informal_decision' => $data['informal_decision'],
                'situation'         => $data['situation']
            ]);
        }
        $profile->save();
    }

    public function updateDesire(UpdateDesireRequest $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }
        $this->saveDesires($request->all());
        return response()->json([
            'message' => 'ユーザー情報を編集しました',
            'status' => 'success'
        ], Response::HTTP_OK);
    }

    private function saveDesires($data)
    {
        $user = Auth::user();
        $profile = UserProfile::where(['user_id' => $user['id']])->first();
        if ($profile) {
            $profile->axis_reason = $data['axis_reason'];
        } else {
            $profile = new UserProfile([
                'user_id'     => $user['id'],
                'axis_reason' => $data['axis_reason'],
            ]);
        }
        $profile->save();

        $user->Desire()->sync($data['desire']);
    }
}
