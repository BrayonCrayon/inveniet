@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3><i class="fas fa-bong"></i> {{ $event->name }}</h3>
                            <hr>
                            <form action="">
                                <inv-form-group label="Name" name="name" value="{{ $event->name }}"
                                                is-disabled="true"></inv-form-group>

                                <inv-form-group label="Address" name="address"
                                                value="{{ $event->address }}" is-disabled="true"></inv-form-group>

                                <inv-form-group label="Description" name="description"
                                                type="textarea"
                                                value="{{  $event->description }}" is-disabled="true">
                                </inv-form-group>

                                <inv-form-group label="RSVP" name="rsvp_by"
                                                value="{{ Carbon::parse($event->rsvp_by)->toDayDateTimeString() }}"
                                                is-disabled="true"></inv-form-group>

                                <div class="form-group">
                                    <div class="row">
                                        <inv-form-group label="Start Date" name="start_date" class="col-6"
                                                        type="date"
                                                        value="{{  Carbon::parse($event->starts_at)->toDateString() }}"
                                                        is-disabled="true">
                                        </inv-form-group>
                                        <inv-form-group label="Start Time" name="start_time" class="col-6"
                                                        type="time"
                                                        value="{{ Carbon::parse($event->starts_at)->toTimeString() }}"
                                                        is-disabled="true">
                                        </inv-form-group>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <inv-form-group label="End Date" name="end_date" class="col-6"
                                                        type="date"
                                                        value="{{  Carbon::parse($event->ends_at)->toDateString() }}"
                                                        is-disabled="true">
                                        </inv-form-group>
                                        <inv-form-group label="End Time" name="end_time" class="col-6"
                                                        type="time"
                                                        value="{{ Carbon::parse($event->ends_at)->toTimeString() }}"
                                                        is-disabled="true">
                                        </inv-form-group>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
