<?php

namespace App\Http\Controllers\Adviser;

use Illuminate\Http\Request;
use App\MeetingRequest;
use App\Http\Controllers\Adviser\AdvisersController;

class MeetingRequestsController extends AdvisersController
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
}
