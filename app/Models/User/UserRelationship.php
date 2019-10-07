<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRelationship extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'related_user_id',
        'user_relationship_type_id',
        'relationship_status_id',
    ];

    protected $with = ['status', 'type', 'relatedUser', 'user'];


    public function relationshipType()
    {
        return $this->hasOne(UserRelationshipType::class);
    }


    public function addRelationship($user_id, $relationshipType_id)
    {
        UserRelationship::create([
            'user_id'                   => auth()->user()->id,
            'related_user_id'           => $user_id,
            'user_relationship_type_id' => $relationshipType_id,
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(RelationshipStatus::class, 'relationship_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(UserRelationshipType::class, 'user_relationship_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relatedUser()
    {
        return $this->belongsTo(User::class, 'related_user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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

    public function scopePendingRequests($query)
    {
        return $query->where('related_user_id', auth()->user()->id)->where('relationship_status_id',
            RelationshipStatus::PENDING_STATUS);
    }
}
