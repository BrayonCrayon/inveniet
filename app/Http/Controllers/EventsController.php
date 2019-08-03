<?php

namespace App\Http\Controllers;

use App\Attendee;
use App\AttendeeStatus;
use App\AttendeeType;
use App\Event;
use App\Http\Requests\EventRequest;
use App\RepeatedType;
use Carbon\Carbon;

class EventsController extends Controller
{

    /**
     * EventsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::eventsCurrentlyIn()->orderBy('events.starts_at')->paginate(10);

        return view('event.index', [
            'events' => $events
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        $events = Event::eventsCurrentlyNotIn()
            ->where('events.name', 'like', request('search') . '%')
            ->orderBy('events.starts_at')
            ->paginate(10);

        return view('event.search', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        // Upon request 'repeated' will be either; null="Not Checked", on="Checked"
        $event = Event::create([
                                   'name' => $request->get('name'),
                                   'address' => $request->get('address'),
                                   'description' => $request->get('description'),
                                   'rsvp_by' => Carbon::parse($request->get('rsvp_by')),
                                   'starts_at' => Carbon::parse($request->get('start_date') . ' ' . $request->get('start_time')),
                                   'ends_at' => Carbon::parse($request->get('end_date') . ' ' . $request->get('end_time')),
                                   'repeated' => $request->get('repeated') === null ? false : true,
                                   'repeated_type_id' => $request->get('repeatedType')
                               ]);
        Attendee::addAttendee(auth()->user()->id, $event->id, AttendeeType::HOST, AttendeeStatus::ATTENDING);
        return redirect()->action('EventsController@index')->with('message', 'Event Created! :D');
    }

    /**
     * Display the specified resource.
     *
     * @param Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('event.show', [
            'event' => $event,
            'attendees' => $event->eventAttendees,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('event.edit', [
            'event' => $event,
            'attendees' => $event->eventAttendees,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $event->update([
                           'name' => $request->get('name'),
                           'address' => $request->get('address'),
                           'description' => $request->get('description'),
                           'rsvp_by' => Carbon::parse($request->get('rsvp_by')),
                           'starts_at' => Carbon::parse($request->get('start_date') . ' ' . $request->get('start_time')),
                           'ends_at' => Carbon::parse($request->get('end_date') . ' ' . $request->get('end_time')),
                           'repeated' => $request->get('repeated'),
                           'repeated_type_id' => $request->get('repeatedType')
                       ]);
        return back()->with('message', 'Event Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->action('EventsController@index');
    }
}
