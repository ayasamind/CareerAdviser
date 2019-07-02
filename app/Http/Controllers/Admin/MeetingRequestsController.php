<?php

namespace App\Http\Controllers\Admin;

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
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $meetingRequests = MeetingRequest::orderByDesc('created_at')->paginate(10);
        return view('admin.requests.index', [
            'meetingRequests' => $meetingRequests,
        ]);
    }

    public function show($id)
    {
        $meetingRequest = MeetingRequest::with(['Adviser', 'User'])->find($id);
        return view('admin.requests.show', [
            'meetingRequest' => $meetingRequest,
        ]);
    }
}
