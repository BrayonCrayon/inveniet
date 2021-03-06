<?php

namespace App\Http\Controllers\Attendees;

use App\Http\Controllers\Controller;
use App\Models\Attendee;
use App\Models\AttendeeStatus;
use App\Models\AttendeeType;
use App\Models\Event;
use \Carbon\Carbon;
use Exception;
use \Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttendeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $event = Event::findOrFail($request->get('eventId'));
        Attendee::addAttendee(auth()->user()->id, $event->id, AttendeeType::GUEST, AttendeeStatus::ATTENDING);

        return redirect()->action('event.index')->with('message', 'You are Attending: ' . $event->name );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Attendee $attendee
     * @return Response
     */
    public function show(Attendee $attendee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Attendee $attendee
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, Attendee $attendee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Attendee $attendee
     * @return Response
     * @throws Exception
     */
    public function destroy(Attendee $attendee)
    {
        $attendee->delete();
        $route = (auth()->user()->id === $attendee->user_id) ? 'event.show' : 'event.edit';
        return redirect()->route($route, $attendee->event_id);
    }
}
