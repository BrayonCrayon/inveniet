<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{

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

}
