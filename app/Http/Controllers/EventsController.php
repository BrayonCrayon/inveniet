<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRequest;
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
        $events = Event::orderByDesc('id')->paginate(10);
        return view('event.index', [
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
        Event::create([
            'name'        => $request->get('name'),
            'address'     => $request->get('address'),
            'description' => $request->get('description'),
            'rsvp_by'     => Carbon::parse($request->get('rsvp_by')),
            'starts_at'   => Carbon::parse($request->get('start_date') . ' ' . $request->get('start_time')),
            'ends_at'     => Carbon::parse($request->get('end_date') . ' ' . $request->get('end_time')),
        ]);

        return redirect()->action('EventsController@index')->with('message', 'Event Created! :D');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('event.show', [
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('event.edit', [
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        $event = Event::findOrFail($id);

        $event->update([
            'name'        => $request->get('name'),
            'address'     => $request->get('address'),
            'description' => $request->get('description'),
            'rsvp_by'     => Carbon::parse($request->get('rsvp_by')),
            'starts_at'   => Carbon::parse($request->get('start_date') . ' ' . $request->get('start_time')),
            'ends_at'     => Carbon::parse($request->get('end_date') . ' ' . $request->get('end_time')),
        ]);

        return back()->with('message', 'Event Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->action('EventsController@index');
    }
}
