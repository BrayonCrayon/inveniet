<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
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
     * @return mixed
     */
    public function getContactsAttribute()
    {
        return User::whereIn('id', $this->relationships->pluck('related_user_id'))->get();
    }


    /**
     * @param $query
     * @return mixed (Filters out the logged in user out of the result set.)
     */
    public function scopeNotMe($query) {
        return $query->where('id', '<>', auth()->user()->id);
    }


    /**
     * @param $query
     * @param $name
     * @return mixed (Restricts results for any users that have a name like)
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

}
