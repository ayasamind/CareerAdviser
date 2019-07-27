<?php

namespace App\Http\Controllers\Adviser;

use Illuminate\Http\Request;
use App\MeetingRequest;
use App\Http\Controllers\Controller;
use App\Requests\Adviser\UpdateMeetingRequest;
use App\Mail\ApprovedMeetingMail;
use App\Mail\DeniedMeetingMail;
use Illuminate\Support\Facades\Mail;
use App\AdviserSchedule;
use App\Adviser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdviserSchedulesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:adviser');
    }

    public function index(Request $request)
    {
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
        $adviser = Adviser::with(['AdviserProfile', 'AdviserCareer', 'Tag'])->findOrFail(Auth::user()->id);
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

        return view('adviser.schedules.index', [
            'adviser' => $adviser,
            'week'    => $week,
            'schedules' => $schedules,
            'array' => $array,
        ]);
    }

    public function edit($id, Request $request)
    {
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
        $adviser = Adviser::with(['AdviserProfile', 'AdviserCareer', 'Tag'])->findOrFail(Auth::user()->id);
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
            ->addSelect('id', 'adviser_id', 'type')
            ->get();

        if (!$adviser->AdviserProfile) {
            abort(404);
        }

        $schedule_lists = AdviserSchedule::getScheduleLists();

        return view('adviser.schedules.edit', [
            'adviser' => $adviser,
            'week'    => $week,
            'schedules' => $schedules,
            'array' => $array,
            'schedule_lists' => $schedule_lists
        ]);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        $adviser_id = Auth::user()->id;

        $params = [];
        foreach ($data['schedules'] as $schedule => $type) {
            if ($type['id']) {
                $params[] = [
                    'date'       => new Carbon($schedule),
                    'id'         => $type['id'],
                    'adviser_id' => $adviser_id,
                    'type'       => $type['type']
                ];
            } elseif ($type['type']) {
                // 新規
                AdviserSchedule::create([
                    'date'       => new Carbon($schedule),
                    'id'         => $type['id'],
                    'adviser_id' => $adviser_id,
                    'type'       => $type['type']
                ]);
            }
        }

        foreach ($params as $param) {
            if ($param['type']) {
                // 編集
                $AdviserSchedule = AdviserSchedule::find($param['id']);
                $AdviserSchedule->type = $param['type'];
                $AdviserSchedule->save();
            } else {
                // 削除
                AdviserSchedule::destroy($param['id']);
            }
        };
        return redirect()->route('adviser.schedules.index')
            ->with('success', 'スケジュールを保存しました');
    }

    private function saveSchedule($meetingRequest)
    {
        AdviserSchedule::create([
            'adviser_id' => $meetingRequest->adviser_id,
            'date'       => $meetingRequest->date,
            'type'       => AdviserSchedule::SCHEDULE_TYPE_NG
        ]);
    }
}
