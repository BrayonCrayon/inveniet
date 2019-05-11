<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $guarded = [];


    /**
     * @return string
     * (Returns a date that is in readable format.)
     */
    public function getStartsAtDiffAttribute()
    {
        return Carbon::parse($this->starts_at)->diffForHumans();
    }


    /**
     *  Retrieves all Attendees(Users) that are attending the specified Event
     */
    public function getEventAttendeesAttribute()
    {
        return Attendee::where('event_id', '=', $this->id)->get();
    }


    /**
     * @param $query
     * @return mixed (Finds all Events the logged in user is attending)
     */
    public function scopeEventsCurrentlyIn($query)
    {
        return $query->whereIn('id', auth()->user()->attendingEvents->pluck('event_id'));
    }


    /**
     * @param $query
     * @return mixed (Finds all Events the logged in user is not attending)
     */
    public function scopeEventsCurrentlyNotIn($query)
    {
        return $query->whereNotIn('id', auth()->user()->attendingEvents->pluck('event_id'));
    }



    public function updateEvent($request)
    {
        Event::update([
                          'name' => $request->get('name'),
                          'address' => $request->get('address'),
                          'description' => $request->get('description'),
                          'rsvp_by' => Carbon::parse($request->get('rsvp_by')),
                          'starts_at' => Carbon::parse($request->get('start_date') . ' ' . $request->get('start_time')),
                          'ends_at' => Carbon::parse($request->get('end_date') . ' ' . $request->get('end_time')),
                      ]);
    }

}
