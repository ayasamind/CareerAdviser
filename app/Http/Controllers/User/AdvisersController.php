<?php

namespace App\Http\Controllers\User;

use App\Adviser;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Requests\Common\AdviserRequest;
use App\Http\Requests\User\SaveReviewRequest;
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
use App\Repositories\Slack\SlackRepositoryInterface;
use App\Notifications\NewRequestSlack;
use App\Notifications\NewReviewSlack;

class AdvisersController extends UsersController
{
    public function __construct(SlackRepositoryInterface $SlackRepository)
    {
        $this->SlackRepository = $SlackRepository;
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
        $meetingRequests = MeetingRequest::with('User.UserProfile')
            ->where('adviser_id', $id)
            ->whereNotNull('review')
            ->paginate(5);

        $canWriteReview = null;
        if (Auth::check()) {
            $canWriteReview = MeetingRequest::where('user_id', Auth::user()->id)
                ->where('status', MeetingRequest::STATUS_TYPE_APPROVED)
                ->whereNull('review')
                ->where('date', '<', new Carbon())
                ->orderByDesc('created_at')
                ->first();
        }

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
            ->whereBetween('date', [$week[0],  $Carbon8->addDay(9)])
            ->select('date')
            ->distinct()
            ->addSelect('adviser_id', 'type')
            ->get();

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
            'user' => $user,
            'meetingRequests' => $meetingRequests,
            'canWriteReview' => $canWriteReview
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
        $adviser = Adviser::find($data['adviser_id']);
        Mail::to($adviser->email)->send(new NewMeetingMail($meetingRequest, $user, $adviser));
        $message = [
            'url' => route('admin.requests.show', [
                'id' => $meetingRequest->id
            ]),
            'user_name' => $user->name,
            'adviser_name' => $adviser->name,
            'date' => new Carbon($data['date']),
        ];
        $this->SlackRepository->notify(new NewRequestSlack($message));
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

    public function review($id)
    {
        $meetingRequest = MeetingRequest::find($id);
        $adviser = Adviser::with('AdviserProfile')->findOrFail($meetingRequest->adviser_id);
        return view('user.advisers.review', [
            'meetingRequest' => $meetingRequest,
            'adviser' => $adviser
        ]);
    }

    public function save_review($id, SaveReviewRequest $request)
    {
        $data = $request->all();
        $meetingRequest = MeetingRequest::find($id);
        $meetingRequest->review = $data['review'];
        $meetingRequest->star = $data['star'];
        $meetingRequest->update();

        $message = [
            'star' => $data['star'],
            'review' => $data['review'],
            'url' => route('admin.reviews'),
            'date' => new Carbon(),
        ];
        $this->SlackRepository->notify(new NewReviewSlack($message));
        return redirect()->route('user.mypage')->with('success', 'レビューを登録しました');
    }
}
