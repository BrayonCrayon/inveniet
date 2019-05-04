<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendeeType extends Model
{
    protected $fillable = [];

    public static $HOST = 1;
    public static $GUEST = 2;
}
