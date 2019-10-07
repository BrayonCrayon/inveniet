<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepeatedType extends Model
{
    protected $fillable = [];

    public static function yearly()
    {
        return RepeatedType::where('name', '=', 'Yearly')->get()->id;
    }

    public static function monthly()
    {
        return RepeatedType::where('name', '=', 'Yearly')->get()->id;
    }

    public static function weekly()
    {
        return RepeatedType::where('name', '=', 'Yearly')->get()->id;
    }

    public static function daily()
    {
        return RepeatedType::where('name', '=', 'Yearly')->get()->id;
    }



}
