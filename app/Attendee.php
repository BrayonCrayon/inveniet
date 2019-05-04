<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $guarded = [];

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
    public function attendingEvent()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * @param $user_id
     * @param $event_id
     * @param $attendee_type
     */
    //TODO: THIS METHOD SHOULD NOT BE STATIC TO BE CALLED FIND ANOTHER WAY TO CALL THIS METHOD
    public static function addAttendee($userId, $eventId, $attendee_type)
    {
        Attendee::create([
            'user_id' => $userId,
            'event_id' => $eventId,
            'attendee_type_id' => $attendee_type,
            'attendee_status_id' => 2,
        ]);
    }

}
