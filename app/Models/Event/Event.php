<?php

namespace App\Models;

use App\Mail\MailEventReminder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;

/**
 * @property mixed eventAttendees
 * @property mixed repeated
 * @property mixed rsvp_by
 * @property mixed description
 * @property mixed address
 * @property mixed name
 */
class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'description',
        'rsvp_by',
        'starts_at',
        'ends_at',
        'repeated',
        'repeated_type_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function repeatedType()
    {
        return $this->hasOne(RepeatedType::class, 'repeated_type_id');
    }

    /**
     * @param $val
     * (Sets the repeated value )
     */
    public function setRepeatedAttribute($val)
    {
        $this->attributes['repeated'] = (bool)$val;
    }

    /**
     * @return int
     */
    public function getRepeatedTypeIdAttribute()
    {
        return $this->attributes['repeated_type_id'] === null ? 0 : $this->attributes['repeated_type_id'];
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
            Mail::to($user->email)->send(new MailEventReminder($this, $user->name));
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
