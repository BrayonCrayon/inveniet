<?php

namespace App\Http\Controllers;

use \App\Attendee;
use \App\AttendeeStatus;
use \App\AttendeeType;
use \App\Event;
use \Carbon\Carbon;
use \Illuminate\Http\Request;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = Event::findOrFail($request->get('eventId'));
        Attendee::addAttendee(auth()->user()->id, $event->id, AttendeeType::GUEST, AttendeeStatus::ATTENDING);

        return redirect()->action('EventsController@index')->with('message', 'You are Attending: ' . $event->name );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeMany(Request $request)
    {
        $userInvites = collect($request->get('userInvites'));
        $event = Event::findOrFail($request->get('eventId'));

        $userInvites->each(function ($item, $key) use ($event) {
            $type = $item['attendeeType'] === 'Host' ? AttendeeType::HOST : AttendeeType::GUEST;
            Attendee::addAttendee($item['id'], $event->id, $type, AttendeeStatus::NOT_ATTENDING);
        });

        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Attendee $attendee
     * @return \Illuminate\Http\Response
     */
    public function show(Attendee $attendee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Attendee $attendee
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendee $attendee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Attendee $attendee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendee $attendee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Attendee $attendee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendee $attendee)
    {
        $attendee->delete();
        return redirect()->route((auth()->user()->id === $attendee->user_id) ? 'event.show' : 'event.edit', ['id' => $attendee->event_id]);
    }
}
