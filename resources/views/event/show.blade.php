@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="flex w-full justify-center">
            <div class="card shadow w-full sm:w-3/4 lg:w-1/2">
                <div class="card-body">
                    <div class="flex justify-between border-b-2 border-warm-grey-700 mb-2 p-2">
                        <div class="flex-grow self-center text-xl lg:w-3/4 lg:text-xl ">
                            <i class="fas fa-calendar-plus"></i> {{ $event->name }}
                        </div>
                        <div class="self-center flex justify-end lg:w-1/4">

                            @if(!auth()->user()->isAttending($event->id ))
                                <form
                                    action="{{ route('attendee.store', ['userInvites' => [auth()->user()->id], 'eventId' => $event->id ]) }}"
                                    method="POST">
                                    @method('POST')
                                    @csrf
                                    <button
                                        class="btn bg-yellow-dark hover:bg-yellow text-white font-semibold shadow text-sm md:text-base lg:text-lg ">
                                        <i class="fas fa-calendar-plus md:mr-2"></i>
                                        <div class="hidden md:inline-block">
                                            Attend
                                        </div>
                                    </button>
                                </form>
                            @else
                                <form
                                    action="{{ route('attendee.destroy', auth()->user()->getUserAttendee($event->id) ) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button
                                        class="btn text-sm md:text-base bg-red hover:bg-red-dark font-semibold text-white lg:text-lg">
                                        <i class="fas fa-door-open md:mr-2"></i>
                                        <div class="hidden md:inline-block">
                                            Leave
                                        </div>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <inv-form-group label="Name" name="name" value="{{ $event->name }}"
                                    is-disabled></inv-form-group>

                    <inv-form-group label="Address" name="address"
                                    value="{{ $event->address }}" is-disabled></inv-form-group>

                    <inv-form-group label="Description" name="description"
                                    type="textarea"
                                    value="{{  $event->description }}" is-disabled>
                    </inv-form-group>

                    <inv-form-group label="RSVP"
                                    value="{{ Carbon::parse($event->rsvp_by)->toDayDateTimeString() }}"
                                    is-disabled></inv-form-group>

                    <inv-form-group label="Starts At"
                                    value="{{ Carbon::parse($event->starts_at)->toDayDateTimeString() }}"
                                    is-disabled></inv-form-group>

                    <inv-form-group label="Ends At"
                                    value="{{ Carbon::parse($event->ends_at)->toDayDateTimeString() }}"
                                    is-disabled></inv-form-group>

                    <inv-event-repeated :value="{{ $event->repeated }}"
                                        :current-type="{{ $event->repeated_type_id  }}"
                                        :types="{{ $repeatedTypes }}" disabled></inv-event-repeated>

                    <div class="flex flex-row justify-between mt-10">
                        <div class="self-center text-sm md:text-lg lg:text-2xl">
                            <i class="fas fa-user-friends"></i>Attendees
                        </div>
                    </div>
                    <hr>
                    <list-group-scrollable>
                        @foreach($attendees as $attendee)
                            <div class="list-group-item border-0">
                                <div class="flex flex-wrap">
                                    <div class="w-full md:w-1/2">
                                        <div class="text-sm font-bold text-grey-darkest md:text-base">
                                            {{ $attendee->user->name }}
                                        </div>
                                        <div class="text-grey-dark text-xs md:text-sm">
                                            {{ $attendee->user->email }}
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <inv-attendee-status attendee-type="{{ $attendee->attendeeType->name }}"
                                                             attendee-status="{{ $attendee->attendeeStatus->name }}"></inv-attendee-status>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </list-group-scrollable>

                </div>
            </div>
        </div>
    </div>



@endsection
