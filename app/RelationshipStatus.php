<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelationshipStatus extends Model
{
    protected $guarded = [];

    public const PENDING_STATUS = 1;
    public const DECLINED_STATUS = 2;
    public const ACCEPTED_STATUS = 3;
}
