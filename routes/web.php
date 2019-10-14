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
Route::resource('user', 'UserController');

/*  EVENT ROUTES  */
Route::get('event/search', [
    'uses' => 'Events\EventSearchController',
])->name('event.search');

Route::resource('event', 'Events\EventsController');


/*********************************/
/*  CONTACT ROUTES              */
/*********************************/
Route::get('contacts/search', [
    'uses' => 'UserRelationshipsController@search',
])->name('contacts.search');

Route::resource('contacts', 'UserRelationshipsController');

/*********************************/
/*  RELATIONSHIP REQUEST ROUTES  */
/*********************************/
Route::resource('relationship-requests', 'UserRelationshipRequestsController');
Route::put('relationship-requests/{relationship}/accept', 'Relationships\AcceptRelationshipRequestController')->name('relationship-requests.accept');


/*********************************/
/*  ATTENDEE REQUEST ROUTES     */
/*********************************/
Route::get('attendee-requests', 'Attendees\FetchAttendeeRequestsController');
Route::delete('attendee-request/{attendee}/decline', 'Attendees\DeclineAttendeeRequestController')->name('attendee-requests.decline');
Route::put('attendee-requests/{attendee}/accept', 'Attendees\AcceptAttendeeRequestController')->name('attendee-requests.accept');

/*********************************/
/*  ATTENDEE ROUTES              */
/*********************************/
Route::post('/attendee/search', 'Events\SearchNewAttendeesController');

Route::post('/attendee/storeMany', [
    'uses' => 'Attendees\AttendeeController@storeMany'
])->name('attendee.storeMany');

Route::resource('attendee', 'Attendees\AttendeeController');




