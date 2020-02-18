<?php

namespace App\Observers;

use App\Models\RelationshipStatus;
use App\Models\UserRelationship;

class UserRelationshipObserver
{
    /**
     * Handle the user relationship "created" event.
     *
     * @param UserRelationship $relationship
     * @return void
     */
    public function created(UserRelationship $relationship)
    {
        $inverseRelationship = UserRelationship::where('user_id',
            $relationship->related_user_id)->where('related_user_id', $relationship->user_id)->first();

        /* check if the inverse already exists */
        if (!$inverseRelationship) { // Same results as isset since our above query will return null if no result is found
            UserRelationship::create([
                'user_id'                   => $relationship->related_user_id,
                'related_user_id'           => $relationship->user_id,
                'user_relationship_type_id' => $relationship->user_relationship_type_id,
                'relationship_status_id'    => RelationshipStatus::ACCEPTED_STATUS
            ]);
        }
    }

    /**
     * Handle the user relationship "updated" event.
     *
     * @param  \App\UserRelationship $userRelationship
     * @return void
     */
    public function updated(UserRelationship $userRelationship)
    {
        //
    }

    /**
     * Handle the user relationship "deleted" event.
     *
     * @param  \App\UserRelationship $userRelationship
     * @return void
     */
    public function deleted(UserRelationship $userRelationship)
    {
        $relationship = UserRelationship::where('user_id',
            $userRelationship->related_user_id)->where('related_user_id', $userRelationship->user_id)->first();

        if ($relationship) {
            $relationship->delete();
        }
    }

    /**
     * Handle the user relationship "restored" event.
     *
     * @param  \App\UserRelationship $userRelationship
     * @return void
     */
    public function restored(UserRelationship $userRelationship)
    {
        //
    }

    /**
     * Handle the user relationship "force deleted" event.
     *
     * @param  \App\UserRelationship $userRelationship
     * @return void
     */
    public function forceDeleted(UserRelationship $userRelationship)
    {
        //
    }
}
