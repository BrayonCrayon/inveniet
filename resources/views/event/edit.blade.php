@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="flex justify-between">
                                <h3><i class="fas fa-bong"></i> {{ $event->name }}</h3>
                                <form action="{{ route('event.destroy', ['id' => $event->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn hover:bg-red-lightest text-red-darkest text-lg">
                                        <i class="fas fa-dumpster-fire"></i> Delete
                                    </button>
                                </form>
                            </div>
                            <hr>
                            <form action="{{ route('event.update', ['id' => $event->id ]) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <inv-form-group label="Name" name="name" value="{{ $event->name }}"></inv-form-group>

                                <inv-form-group label="Address" name="address"
                                                value="{{ $event->address }}"></inv-form-group>

                                <inv-form-group label="Description" name="description"
                                                type="textarea"
                                                value="{{  $event->description }}">
                                </inv-form-group>

                                <inv-form-group label="RSVP" name="rsvp_by"
                                                value="{{ Carbon::parse($event->rsvp_by)->toDayDateTimeString() }}"
                                ></inv-form-group>

                                <div class="form-group">
                                    <div class="row">
                                        <inv-form-group label="Start Date" name="start_date" class="col-6"
                                                        type="date"
                                                        value="{{  Carbon::parse($event->starts_at)->toDateString() }}">
                                        </inv-form-group>
                                        <inv-form-group label="Start Time" name="start_time" class="col-6"
                                                        type="time"
                                                        value="{{ Carbon::parse($event->starts_at)->toTimeString() }}">
                                        </inv-form-group>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <inv-form-group label="End Date" name="end_date" class="col-6"
                                                        type="date"
                                                        value="{{  Carbon::parse($event->ends_at)->toDateString() }}">
                                        </inv-form-group>
                                        <inv-form-group label="End Time" name="end_time" class="col-6"
                                                        type="time"
                                                        value="{{ Carbon::parse($event->ends_at)->toTimeString() }}">
                                        </inv-form-group>
                                    </div>

                                </div>

                                <div class="flex justify-end">
                                    <a href="{{ route('event.index') }}"
                                       class="btn bg-red-dark hover:bg-red text-white font-bold text-lg shadow mx-2">
                                        Cancel
                                    </a>

                                    <button class="btn bg-green-dark hover:bg-green text-white font-bold text-lg shadow">
                                        Update
                                    </button>
                                </div>
                            </form>

                            <div class="flex justify-end">
                                <inv-attendee-modal :event-id="{{ $event->id }}"></inv-attendee-modal>
                            </div>

                            <div class="list-group">
                                @foreach($attendees as $attendee)
                                    <div class="list-group-item">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="font-bold text-grey-darkest">
                                                        {{ $attendee->user->name }}
                                                    </div>
                                                    <div class="text-grey-dark text-sm">
                                                        {{ $attendee->user->email }}
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="font-bold text-grey-darkest">
                                                        {{ $attendee->attendeeType->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
