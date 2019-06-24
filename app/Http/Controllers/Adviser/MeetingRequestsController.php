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

class MeetingRequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:adviser');
    }

    public function index()
    {
        $requests = MeetingRequest::orderByDesc('created_at')->paginate(10);
        return view('adviser.requests.index', [
            'requests' => $requests,
        ]);
    }

    public function edit($id)
    {
        $meetingRequest = MeetingRequest::with('User')->find($id);
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
            Mail::to($meetingRequest->User->email)->send(new ApprovedMeetingMail($meetingRequest));
            $this->saveSchedule($meetingRequest);
            $message = '面談を承認しました';
        } elseif ($meetingRequest->status == MeetingRequest::STATUS_TYPE_DENIED) {
            Mail::to($meetingRequest->User->email)->send(new DeniedMeetingMail($meetingRequest));
            $message = '面談を拒否しました';
        }
        return redirect()->route('adviser.requests.index')->with('success', $message);
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
