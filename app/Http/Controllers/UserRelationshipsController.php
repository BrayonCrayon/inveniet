<?php

namespace App\Http\Controllers;

use \App\User;
use \App\UserRelationship;
use \App\UserRelationshipType;
use \App\Http\Requests\UserRelationshipsRequest;
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
        $contacts = auth()->user()->contacts;
        return view('contacts.index', [
            'contacts' => $contacts
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
            ->notMyContacts()->get();

        return view('contacts.index', ['contacts' => $searchedContacts]);
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
    public function store(Request $request)
    {
        UserRelationship::create([
            'user_id' => auth()->user()->id,
            'related_user_id' => $request->get('user_id'),
            'user_relationship_type_id' => UserRelationshipType::find(1)->id,
        ]);

        return redirect('contacts');
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
        $relationship = UserRelationship::where('user_id', '=', auth()->user()->id)
            ->where('related_user_id', '=', $user_id)->first();

        $relationship->delete();

        return redirect('contacts');
    }
}
