<?php

namespace App\Http\Controllers\Attendees;

use App\Http\Controllers\Controller;
use App\Models\AttendeeType;
use Illuminate\Http\Request;

class AttendeeTypeController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AttendeeType  $attendeeType
     * @return \Illuminate\Http\Response
     */
    public function show(AttendeeType $attendeeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AttendeeType  $attendeeType
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendeeType $attendeeType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AttendeeType  $attendeeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendeeType $attendeeType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AttendeeType  $attendeeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendeeType $attendeeType)
    {
        //
    }
}
