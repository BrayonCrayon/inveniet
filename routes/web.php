<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*  USER ROUTES  */
Route::get('user/search', 'UserController@search');
Route::resource('user', 'UserController');

/*  EVENT ROUTES  */
Route::get('event/search', 'EventsController@search');
Route::resource('event', 'EventsController');

/*  CONTACT ROUTES  */
Route::get('contacts/search', 'UserRelationshipsController@search');
Route::resource('contacts', 'UserRelationshipsController');

/*  RELATIONSHIP REQUEST ROUTES  */
Route::resource('relationship-requests', 'UserRelationshipRequestsController');
Route::put('relationship-requests/{relationship}/accept', 'Relationships\AcceptRelationshipRequestController')->name('relationship-requests.accept');

