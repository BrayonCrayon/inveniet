<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Attendee;
use App\Models\AttendeeStatus;
use App\Models\AttendeeType;
use App\Models\Event;
use App\Models\RepeatedType;
use Exception;
use Illuminate\Http\Response;

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
     * @return Response
     */
    public function index()
    {
        $events = Event::eventsCurrentlyIn()->orderBy('events.starts_at')->paginate(10);

        return view('event.index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('events.create');
        return view('event.create', [
            'repeatedTypes' => RepeatedType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @return Response
     */
    public function store(EventRequest $request)
    {
        $this->authorize('events.create');
        $event = Event::create($request->all());
        Attendee::addAttendee(auth()->user()->id, $event->id, AttendeeType::HOST, AttendeeStatus::ATTENDING);
        return redirect()->route('event.index')->with('message', 'Event Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Event $event
     * @return Response
     */
    public function show(Event $event)
    {
        $this->authorize('events.view', $event);
        return view('event.show', [
            'event' => $event,
            'attendees' => $event->eventAttendees,
            'repeatedTypes' => RepeatedType::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Event $event
     * @return Response
     */
    public function edit(Event $event)
    {
        $this->authorize('events.update', $event);
        return view('event.edit', [
            'event' => $event,
            'attendees' => $event->eventAttendees,
            'repeatedTypes' => RepeatedType::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param Event $event
     * @return Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $this->authorize('events.update', $event);
        $event->update($request->all());
        return back()->with('message', 'Event Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Event $event
     * @return Response
     * @throws Exception
     */
    public function destroy(Event $event)
    {
        $this->authorize('events.delete', $event);
        $event->delete();
        return redirect()->route('event.index')->with('message', 'Event Removed!');
    }
}
