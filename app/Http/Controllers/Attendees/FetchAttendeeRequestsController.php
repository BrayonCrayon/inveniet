<?php

namespace App\Http\Controllers\Attendees;

use App\Models\Attendee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FetchAttendeeRequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $requests = Attendee::pendingInvites()->get();
        return view('attendee-requests.index', compact('requests'));
    }
}
