<?php

namespace App\Http\Controllers\Events;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventSearchController extends Controller
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
        $events = Event::eventsCurrentlyNotIn()
            ->where('events.name', 'like', request('search') . '%')
            ->orderBy('events.starts_at')
            ->paginate(10);

        return view('event.search', [
            'events' => $events,
            'search' => $request->get('search'),
        ]);
    }
}
