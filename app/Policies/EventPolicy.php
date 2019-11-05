<?php

namespace App\Policies;

use App\Models\Attendee;
use App\Models\AttendeeType;
use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the event.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function view(User $user, Event $event)
    {
        return true;
    }

    /**
     * Determine whether the user can create events.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the event.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function update(User $user, Event $event)
    {
        $attendee = Attendee::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->get();
        return $attendee->pluck('user_id')->contains($user->id) && $attendee->where('user_id', $user->id)->first()->attendeeType->id === AttendeeType::HOST;
    }

    /**
     * Determine whether the user can delete the event.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function delete(User $user, Event $event)
    {
        $attendee = Attendee::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->get();
        return $attendee->pluck('user_id')->contains($user->id) && $attendee->where('user_id', $user->id)->first()->attendeeType->id === AttendeeType::HOST;
    }

    /**
     * Determine whether the user can restore the event.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function restore(User $user, Event $event)
    {
        $attendee = Attendee::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->get();
        return $attendee->pluck('user_id')->contains($user->id) && $attendee->where('user_id', $user->id)->first()->attendeeType->id === AttendeeType::HOST;
    }

    /**
     * Determine whether the user can permanently delete the event.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function forceDelete(User $user, Event $event)
    {
        $attendee = Attendee::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->get();
        return $attendee->pluck('user_id')->contains($user->id) && $attendee->where('user_id', $user->id)->first()->attendeeType->id === AttendeeType::HOST;
    }
}
