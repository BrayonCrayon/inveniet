<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getStartsAtDiffAttribute()
    {
        return Carbon::parse($this->starts_at)->diffForHumans();
    }
}
