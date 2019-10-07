<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendeeType extends Model
{
    protected $fillable = [];
    public const HOST = 1;
    public const GUEST = 2;

}
