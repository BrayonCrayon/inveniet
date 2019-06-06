<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendeeStatus extends Model
{
    protected $fillable = [];
    public const ATTENDING = 1;
    public const NOT_ATTENDING = 2;
}
