<?php

namespace App\Http\Controllers\Attendees;

use App\Attendee;
use App\AttendeeStatus;
use App\AttendeeType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcceptAttendeeRequestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Attendee $attendee
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Attendee $attendee)
    {
        $attendee->update([
            'attendee_status_id' => AttendeeStatus::ATTENDING
        ]);

        return redirect()->route($attendee->attendeeType->id === AttendeeType::$HOST ? 'event.edit' : 'event.show', ['id' => $attendee->event->id]);
    }
}
