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
use Illuminate\Support\Facades\Auth;

class MeetingRequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:adviser');
    }

    public function index()
    {
        $requests = MeetingRequest::with('User')->where('adviser_id', Auth::user()->id)->orderByDesc('created_at')->paginate(10);
        return view('adviser.requests.index', [
            'requests' => $requests,
        ]);
    }

    public function edit($id)
    {
        $meetingRequest = MeetingRequest::with('User')->find($id);
        if ($meetingRequest->adviser_id !== Auth::user()->id) {
            abort(404);
        }
        $duplicateFlag = MeetingRequest::where('date', $meetingRequest->date)
            ->where('id', '!=', $id)
            ->where('status', MeetingRequest::STATUS_TYPE_APPROVED)
            ->get()
            ->count();

        return view('adviser.requests.edit', [
            'meetingRequest' => $meetingRequest,
            'duplicateFlag'  => $duplicateFlag
        ]);
    }

    public function update($id, Request $request)
    {
        $meetingRequest = MeetingRequest::with(['User', 'Adviser'])->find($id);
        $meetingRequest->comment = $request->comment;
        $meetingRequest->status = $request->status;
        $meetingRequest->update();

        if ($meetingRequest->status == MeetingRequest::STATUS_TYPE_APPROVED) {
            // 日程調整ありの予約の場合、その日程をxに変更する
            if (!$meetingRequest->is_no_schedule) {
                $this->saveSchedule($meetingRequest);
            }
            Mail::to($meetingRequest->User->email)->send(new ApprovedMeetingMail($meetingRequest));
            $message = '面談を承認しました';
        } elseif ($meetingRequest->status == MeetingRequest::STATUS_TYPE_DENIED) {
            Mail::to($meetingRequest->User->email)->send(new DeniedMeetingMail($meetingRequest));
            $message = '面談を拒否しました';
        }
        return redirect()->route('adviser.requests.index')->with('success', $message);
    }

    private function saveSchedule($meetingRequest)
    {
        $schedule = AdviserSchedule::where('adviser_id', $meetingRequest->adviser_id)
            ->whereBetween('date', [$meetingRequest->date,  $meetingRequest->date->addMinutes(30)])->first();

        if ($schedule) {
            $schedule->type = AdviserSchedule::SCHEDULE_TYPE_NG;
            $schedule->update();
        } else {
            if ($meetingRequest->date->minute === 30) {
                $date = $meetingRequest->date->addSeconds(1);
            }
            AdviserSchedule::create([
                'adviser_id' => $meetingRequest->adviser_id,
                'date'       => $date,
                'type'       => AdviserSchedule::SCHEDULE_TYPE_NG
            ]);
        }
    }
}
