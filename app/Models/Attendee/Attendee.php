<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'attendee_type_id',
        'attendee_status_id',
    ];

    protected $with = ['user', 'event', 'attendeeType', 'attendeeStatus'];

    /**
     * Retrieves the associated user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Gets the attendee's type for the event.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attendeeType()
    {
        return $this->belongsTo(AttendeeType::class);
    }

    /**
     * Gets the attendee's status for the event
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attendeeStatus()
    {
        return $this->belongsTo(AttendeeStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * @param $user_id
     * @param $event_id
     * @param $attendee_type
     * @param $attendee_status
     */
    //TODO: THIS METHOD SHOULD NOT BE STATIC TO BE CALLED FIND ANOTHER WAY TO CALL THIS METHOD
    public static function addAttendee($user_id, $event_id, $attendee_type, $attendee_status = 2)
    {
        Attendee::create([
            'user_id' => $user_id,
            'event_id' => $event_id,
            'attendee_type_id' => $attendee_type,
            'attendee_status_id' => $attendee_status,
        ]);
    }

    public function scopePendingInvites($query)
    {
        return $query->where('user_id', '=', auth()->user()->id)
            ->where('attendee_status_id', '=', AttendeeStatus::NOT_ATTENDING);
    }

}
