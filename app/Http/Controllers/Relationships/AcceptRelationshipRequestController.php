<?php

namespace App\Http\Controllers\Relationships;

use App\Http\Controllers\Controller;
use App\RelationshipStatus;
use App\UserRelationship;
use Illuminate\Http\Request;

class AcceptRelationshipRequestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param UserRelationship $relationship
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function __invoke(Request $request, UserRelationship $relationship)
    {
        /* Set the status of the relationship to accepted */
        $relationship->update([
            'relationship_status_id' => RelationshipStatus::ACCEPTED_STATUS
        ]);

        UserRelationship::create([
            'user_id'                   => $relationship->related_user_id,
            'related_user_id'           => $relationship->user_id,
            'user_relationship_type_id' => $relationship->user_relationship_type_id,
            'relationship_status_id'    => RelationshipStatus::ACCEPTED_STATUS
        ]);

        return redirect('contacts');
    }
}
