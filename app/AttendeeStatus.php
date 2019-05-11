<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendeeStatus extends Model
{
    protected $fillable = [];
    public static $ATTENDING = 1;
    public static $NOT_ATTENDING = 2;
}
