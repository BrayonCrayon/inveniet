<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRelationship;
use App\Models\UserRelationshipType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserRelationshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contacts = auth()->user()
            ->myContacts()
            ->orderBy('name', 'asc')
            ->paginate();
        $relationshipTypes = UserRelationshipType::all(['id', 'name']);

        return view('contacts.index', [
            'contacts'          => $contacts,
            'relationshipTypes' => $relationshipTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRelationship $userRelationship
     * @return Response
     */
    public function store(UserRelationship $userRelationship)
    {
        $user             = User::findOrFail(request('user_id'));
        $relationshipType = UserRelationshipType::findOrFail(request('relationshipType'));
        $userRelationship->addRelationship($user->id, $relationshipType->id);

        return redirect()->action('UserRelationshipsController@search')->with('message',
            $relationshipType->name . ' ' . $user->name . ' added.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $contact
     * @return Response
     */
    public function destroy(User $contact)
    {
        $relationship = UserRelationship::findRelationship($contact->id)->first();
        dd($relationship);
        $relationship->delete();

        return redirect('contacts')->with('message', $contact->name . ' was Removed.');
    }
}
