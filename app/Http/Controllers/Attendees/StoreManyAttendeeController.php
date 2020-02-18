<?php

namespace App\Http\Controllers\Attendees;

use App\Http\Requests\Attendee\StoreManyAttendeeRequest;
use App\Models\Attendee;
use App\Models\AttendeeStatus;
use App\Models\AttendeeType;
use App\Models\Event;
use App\Http\Controllers\Controller;

class StoreManyAttendeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getType($typeName)
    {
        return $typeName === 'Host' ? AttendeeType::HOST : AttendeeType::GUEST;
    }

    public function addAttendee($attendee, $event)
    {
        Attendee::addAttendee($attendee['id'], $event->id, $this->getType($attendee['attendeeType']), AttendeeStatus::NOT_ATTENDING);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreManyAttendeeRequest $request)
    {
        $userInvites = collect($request->get('userInvites'));
        $event = Event::findOrFail($request->get('eventId'));

        $userInvites->each(function ($item) use ($event) {
            $this->addAttendee($item, $event);
        });

        return response()->json('success');
    }
}
