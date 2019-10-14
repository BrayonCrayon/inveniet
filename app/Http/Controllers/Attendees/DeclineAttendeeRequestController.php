<?php

namespace App\Http\Controllers\Attendees;

use App\Models\Attendee;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeclineAttendeeRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Attendee $attendee
     * @return void
     * @throws Exception
     */
    public function __invoke(Request $request, Attendee $attendee)
    {
        $attendee->delete();
        return redirect()->route('event.index');
    }
}
