<?php

namespace App\Http\Controllers\Events;

use App\User;
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

        $users = User::where('id', '!=', auth()->user()->id)
            ->where('name', 'like', $request->get('search') . '%')
            ->orderBy('name')
            ->get(['id','name']);

        return response()->json($users);
    }
}
