<?php

namespace App\Http\Controllers\Events;


use App\Http\Requests\Attendee\AttendeeSearchRequest;
use App\Models\Event;
use App\Models\User;
use App\Http\Controllers\Controller;

class SearchNewAttendeesController extends Controller
{

    /**
     * InviteAttendeesController constructor.
     */
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
    public function __invoke(AttendeeSearchRequest $request)
    {
        $event = Event::findOrFail($request->get('eventId'));
        $attendees = $event->attendees()->pluck('user_id');

        $users = User::whereNotIn('id', $attendees->toArray())
            ->where('name', 'like', $request->get('search') . '%')
            ->orderBy('name')
            ->get(['id','name']);

        return response()->json($users);
    }
}
