<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{


    /**
     * @return mixed ( Retrieves the associated user )
     */
    public function getUserAttribute()
    {
        return User::findOrFail($this->user_id);
    }


    /**
     * @return mixed ( Gets the attendee's type for the event. )
     */
    public function getAttendeeTypeAttribute()
    {
        return AttendeeType::findOrFail($this->attendee_type_id);
    }


}
