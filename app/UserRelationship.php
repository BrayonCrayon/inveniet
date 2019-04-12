<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRelationship extends Model
{
    protected $fillable = [
        'user_id',
        'related_user_id',
        'user_relationship_type_id'
    ];


    public function relationshipType()
    {
        return $this->hasOne(UserRelationshipType::class);
    }

}
