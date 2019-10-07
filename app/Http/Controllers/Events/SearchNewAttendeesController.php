<?php

namespace App\Http\Controllers\Events;


use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function __invoke(Request $request)
    {
        $request->validate([
            'search' => 'required',
            'eventId' => 'required',
        ]);

        $event = new Event([
            'id' => $request->get('eventId'),
        ]);

        $users = User::where('name', 'like', $request->get('search') . '%')
            ->whereNotIn('id', $event->getEventAttendeesAttribute()->pluck('user_id'))
            ->orderBy('name')
            ->get(['id','name']);

        return response()->json($users);
    }
}
