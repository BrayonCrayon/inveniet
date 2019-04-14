<?php

namespace App\Http\Controllers;

use App\User;
use App\UserRelationship;
use App\UserRelationshipType;
use Illuminate\Http\Request;

class UserRelationshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = auth()->user()->myContacts()->paginate();
        $relationshipTypes = UserRelationshipType::all(['id', 'name']);

        return view('contacts.index', [
            'contacts' => $contacts,
            'relationshipTypes' => $relationshipTypes,
        ]);
    }

    /**
     * Display a listing of Users that are
     *      not related to the current user.
     *
     * NOTE: (... ?? '') If search is not defined
     *          have it default to an empty string.
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $searchedContacts = User::orderBy('name', 'asc')
            ->notMe()
            ->nameLike(request('search') ?? '')
            ->notMyContacts()->paginate();
        $relationshipTypes = UserRelationshipType::all(['id', 'name']);

        return view('contacts.index', [
            'contacts' => $searchedContacts,
            'relationshipTypes' => $relationshipTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    // TODO: Use UserRelationshipsRequest class for validation
    public function store(UserRelationship $userRelationship)
    {
        $user = User::findOrFail(request('user_id'));
        $relationshipType = UserRelationshipType::findOrFail(request('relationshipType'));
        $userRelationship->addRelationship($user->id, $relationshipType->id);

        return redirect('contacts')->with('message', $relationshipType->name . ' ' . $user->name . ' added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user = User::findOrFail($user_id);

        // TODO: Find a way to return one instead of building a collection and returning the first one from that collection
        $relationship = UserRelationship::findRelationship($user->id)->first();
        $relationship->delete();

        return redirect('contacts')->with('message', $user->name . ' was deleted.');
    }
}
