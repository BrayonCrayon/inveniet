<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelationshipStatus extends Model
{
    protected $guarded = [];

    public static function pending()
    {
        return RelationshipStatus::where('name', '=', 'Pending')->get()->id;
    }

    public static function declined()
    {
        return RelationshipStatus::where('name', '=', 'Declined')->get()->id;
    }

    public static function accepted()
    {
        return RelationshipStatus::where('name', '=', 'Accepted')->get()->id;
    }


    public const PENDING_STATUS = 1;
    public const DECLINED_STATUS = 2;
    public const ACCEPTED_STATUS = 3;
}
