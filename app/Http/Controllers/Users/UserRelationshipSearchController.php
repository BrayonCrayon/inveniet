<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\UserRelationshipType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class UserRelationshipSearchController extends Controller
{
    /**
     * Display a listing of Users that are
     *      not related to the current user.
     *
     * NOTE: (... ?? '') If search is not defined
     *          have it default to an empty string.
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $searchedContacts = User::orderBy('name', 'asc')
            ->notMe()
            ->nameLike($request->get('search') ?? '')
            ->notMyContacts()->paginate();

        $relationshipTypes = UserRelationshipType::all(['id', 'name']);

        return view('contacts.search', [
            'contacts' => $searchedContacts,
            'relationshipTypes' => $relationshipTypes,
            'search' => $request->get('search'),
        ]);
    }
}
