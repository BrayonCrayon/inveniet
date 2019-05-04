<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relationships()
    {
        return $this->hasMany(UserRelationship::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendingEvents()
    {
        return $this->hasMany(Attendee::class);
    }


    /**
     * @return mixed
     */
    public function getContactsAttribute()
    {
        return User::myContacts()->get();
    }


    /**
     * @param $query
     * @return mixed (Filters out the logged in user out of the result set.)
     */
    public function scopeNotMe($query)
    {
        return $query->where('id', '<>', auth()->user()->id);
    }


    /**
     * @param $query
     * @param $name
     * @return mixed (Restricts results for any users that have a name like $name)
     */
    public function scopeNameLike($query, $name)
    {
        return $query->where('name', 'like', $name . '%');
    }

    /**
     * @param $query
     * @return mixed (Filters out any users that are already related to the logged in user)
     */
    public function scopeNotMyContacts($query)
    {
        return $query->whereNotIn('id', auth()->user()->contacts->pluck('id'));
    }


    /**
     * @param $related_user_id
     * @return bool ( Determines if you have a relation with the provided $related_user_id )
     */
    public function isContact($related_user_id)
    {
        $contact = $this->relationships->where('related_user_id', '=', $related_user_id)->first();

        return isset($contact) ? true : false;
    }


    /**
     * @param $query
     * @return mixed ()
     */
    public function scopeMyContacts($query)
    {
        return $query->whereIn('id', $this->relationships->pluck('related_user_id'));
    }


    /**
     * @param $related_user_id
     * @return mixed ( Finds the relationship between the logged in user and a related user )
     */
    public function contactRelationship($related_user_id)
    {
        return UserRelationship::findRelationship($related_user_id)->first();
    }


    /**
     * @param $eventId
     * @return bool ( Determines if the user has credentials to edit or delete the present event )
     */
    public function isEventHost($eventId)
    {
        $userAttendee = $this->attendingEvents()
                            ->where('event_id', '=', $eventId)
                            ->get()
                            ->first();
        return isset($userAttendee) && $userAttendee->attendeeType->id == AttendeeType::$HOST;
    }
}
