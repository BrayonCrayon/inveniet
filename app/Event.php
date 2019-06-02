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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }

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

    /**
     * @param $query
     * @param $days
     * @return mixed
     */
    public function scopeWithinDays($query, $days)
    {
        return $query->whereBetween('starts_at', [now(), now()->addDays($days)]);
    }

    /**
     * @param $user
     */
    private function sendMessage($user)
    {
        $this->info("Sending Message to {$user->name}");

        if (config('app.env') === 'production') {
            Twilio::message('5198597787', "Here is a test");
        }
    }

    /**
     * Send SMS notification to attendees of the current event
     */
    public function notifyAttendees()
    {
        $this->attendees->each(function ($attendee) {
            $this->sendMessage($attendee->user);
        });
    }

}
