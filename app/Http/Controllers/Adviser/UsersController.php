<?php

namespace App\Http\Controllers\Adviser;

use Illuminate\Http\Request;
use App\Http\Controllers\Adviser\AdvisersController;
use App\User;
use App\Desire;

class UsersController extends AdvisersController
{
    public function __construct()
    {
        $this->middleware('auth:adviser');
    }

    public function show($id)
    {
        $user = User::with(['UserProfile'])->findOrFail($id);
        $axisList = Desire::where(['type' => Desire::DESIRE_TYPE_AXIS])->pluck('name', 'id');
        $industryList = Desire::where(['type' => Desire::DESIRE_TYPE_INDUSTRY])->pluck('name', 'id');
        $jobList = Desire::where(['type' => Desire::DESIRE_TYPE_JOB])->pluck('name', 'id');
        $prefectureList = Desire::where(['type' => Desire::DESIRE_TYPE_PREFECTURE])->pluck('name', 'id');
        $companyTypeList = Desire::where(['type' => Desire::DESIRE_TYPE_COMPANY_TYPE])->pluck('name', 'id');

        return view('adviser.users.view', [
            'user' => $user,
            'axisList' => $axisList,
            'industryList' => $industryList,
            'jobList'  => $jobList,
            'prefectureList' => $prefectureList,
            'companyTypeList' => $companyTypeList
        ]);
    }
}
