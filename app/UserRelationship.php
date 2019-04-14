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


    public function addRelationship($user_id, $relationshipType_id)
    {
        UserRelationship::create([
            'user_id' => auth()->user()->id,
            'related_user_id' => $user_id,
            'user_relationship_type_id' => $relationshipType_id,
        ]);
    }


    /**
     * @param $query
     * @param $user_id
     * @return mixed ( Finds the relationship between the user logged to the specified user with it's $user_id)
     */
    public function scopeFindRelationship($query, $user_id)
    {
        return $query->where('user_id', '=', auth()->user()->id)
            ->where('related_user_id', '=', $user_id);
    }
}
