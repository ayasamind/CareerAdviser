<?php

namespace App\Http\Controllers\User;

use App\Adviser;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Requests\Common\AdviserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Tag;
use Carbon\Carbon;
use App\AdviserSchedule;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Desire;
use App\MeetingRequest;
use App\Mail\NewMeetingMail;

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
    public function index(Request $request)
    {
        if ($request->query('tag')) {
            $tagId = $request->query('tag');
            $advisers = Adviser::public()->whereHas('AdviserProfile')
                ->whereHas('tag', function ($query) use ($tagId) {
                    $query->where('tags.id', $tagId);
                })->orderByDesc('created_at')->paginate(10);
        } else {
            $advisers = Adviser::public()
                ->whereHas('AdviserProfile')
                ->orderByDesc('created_at')
                ->paginate(15);
        }
        $tags = Tag::all();
        $user = null;
        if (Auth::check()) {
            $user = Auth::user();
        }
        return view('user.advisers.index', [
            'advisers' => $advisers,
            'tags'     => $tags,
            'user'     => $user
        ]);
    }

    /**
     * show
     * アドバイザー詳細画面
     * @author ayasamind
    */
    public function show(Request $request, $id)
    {
        $adviser = Adviser::with(['AdviserProfile', 'AdviserCareer', 'Tag'])->findOrFail($id);
        if (!$adviser->public_flag) {
            abort(404);
        }
        if ($request->query('type')) {
            $Carbon0 = new Carbon($request->query('param')['date']);
            if ($request->query('type') == 'before') {
                $baseDay = $Carbon0->subDay(9)->format('Y-m-d');
            }
            if ($request->query('type') == 'after') {
                $baseDay = $Carbon0->addDay(5)->format('Y-m-d');
            }
        } else {
            $Carbon0 = new Carbon();
            $baseDay = $Carbon0->format('Y-m-d');
        }

        $Carbon1 = new Carbon($baseDay);
        $Carbon2 = new Carbon($baseDay);
        $Carbon3 = new Carbon($baseDay);
        $Carbon4 = new Carbon($baseDay);
        $Carbon5 = new Carbon($baseDay);
        $Carbon6 = new Carbon($baseDay);
        $Carbon7 = new Carbon($baseDay);
        $Carbon8 = new Carbon($baseDay);
        $week = [
            $Carbon1->addDay(2),
            $Carbon2->addDay(3),
            $Carbon3->addDay(4),
            $Carbon4->addDay(5),
            $Carbon5->addDay(6),
            $Carbon6->addDay(7),
            $Carbon7->addDay(8),
        ];
        $array = [
            $Carbon1->format('Y-m-d') => [],
            $Carbon2->format('Y-m-d') => [],
            $Carbon3->format('Y-m-d') => [],
            $Carbon4->format('Y-m-d') => [],
            $Carbon5->format('Y-m-d') => [],
            $Carbon6->format('Y-m-d') => [],
            $Carbon7->format('Y-m-d') => [],
        ];

        foreach ($week as $day) {
            $array[$day->format('Y-m-d')] = AdviserSchedule::getTimeList();
        }

        $schedules = AdviserSchedule::where(['adviser_id' => $adviser->id])
            ->whereBetween('date', [$week[0],  $Carbon8->addDay(9)])->get();

        if (!$adviser->AdviserProfile) {
            abort(404);
        }

        $user = null;
        if (Auth::check()) {
            $user = Auth::user();
        }
        return view('user.advisers.show', [
            'adviser' => $adviser,
            'week'    => $week,
            'schedules' => $schedules,
            'array' => $array,
            'user' => $user
        ]);
    }

    public function confirm($id, $date, $online)
    {
        $date = new Carbon($date);
        $user = User::with(['UserProfile'])->findOrFail(Auth::user()->id);
        $adviser = Adviser::with(['AdviserProfile', 'AdviserCareer', 'Tag'])->public()->findOrFail($id);
        $axisList = Desire::where(['type' => Desire::DESIRE_TYPE_AXIS])->pluck('name', 'id');
        $industryList = Desire::where(['type' => Desire::DESIRE_TYPE_INDUSTRY])->pluck('name', 'id');
        $jobList = Desire::where(['type' => Desire::DESIRE_TYPE_JOB])->pluck('name', 'id');
        $prefectureList = Desire::where(['type' => Desire::DESIRE_TYPE_PREFECTURE])->pluck('name', 'id');
        $companyTypeList = Desire::where(['type' => Desire::DESIRE_TYPE_COMPANY_TYPE])->pluck('name', 'id');
        return view('user.advisers.confirm', [
            'adviser' => $adviser,
            'date'    => $date,
            'user'    => $user,
            'online'    => $online,
            'axisList' => $axisList,
            'industryList' => $industryList,
            'jobList' => $jobList,
            'prefectureList' => $prefectureList,
            'companyTypeList' => $companyTypeList
        ]);
    }

    public function saveRequest(Request $request)
    {
        $meetingRequest = $this->newMeeting($request->all());
        return redirect()->route('user.done_request', [
            'id' => $meetingRequest->id
        ])->with('success', '面談を申し込みました');
    }

    private function newMeeting($data)
    {
        $user = Auth::user();
        $meetingRequest = MeetingRequest::create([
            'adviser_id' => $data['adviser_id'],
            'user_id'    => $user->id,
            'date'       => new Carbon($data['date']),
            'type'       => $data['type'],
            'status'     => MeetingRequest::STATUS_TYPE_UNAPPROVED,
            'place'      => $data['place']
        ]);
        $adviser = Adviser::find($data['adviser_id'])->public();
        Mail::to($adviser->email)->send(new NewMeetingMail($meetingRequest, $user, $adviser));
        return $meetingRequest;
    }

    public function done($id)
    {
        $meetingRequet = MeetingRequest::with(['Adviser'])->findOrFail($id);
        if (Auth::user()->id !== $meetingRequet->user_id) {
            abort(404);
        }
        return view('user.advisers.done', [
            'meetingRequest' => $meetingRequet,
        ]);
    }

    public function sendRequest(Request $request)
    {
        if (!Auth::check() || !$request->query('id')) {
            abort(404);
        }
        $data = [
            'adviser_id' => $request->query('id'),
            'user_id'    => Auth::user()->id,
            'date'       => null,
            'type'       => MeetingRequest::MEETING_TYPE_NO_SCHEDULE,
            'status'     => MeetingRequest::STATUS_TYPE_UNAPPROVED,
            'place'      => null,
        ];
        $meetingRequest = $this->newMeeting($data);
        return redirect()->route('user.done_request', [
            'id' => $meetingRequest->id
        ])->with('success', '面談を申し込みました');
    }
}
