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

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" value="{{ $event->name }}"
                                           class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" value="{{ $event->address }}"
                                           class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" cols="30" rows="4"
                                              class="form-control"
                                              required>{{ $event->description }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="rsvp_by">RSVP</label>
                                    <input type="text" id="rsvp_by" name="rsvp_by"
                                           value="{{  Carbon::parse($event->rsvp_by)->toDayDateTimeString()  }}"
                                           class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" id="start_date" name="start_date"
                                                   class="form-control"
                                                   value="{{  Carbon::parse($event->starts_at)->toDateString() }}"
                                                   required>
                                        </div>
                                        <div class="col">
                                            <label for="start_time">Start Time</label>
                                            <input type="time" id="start_time" name="start_time"
                                                   value="{{  Carbon::parse($event->starts_at)->toTimeString() }}"
                                                   class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="end_date">End Date</label>
                                            <input type="date" id="end_date" name="end_date"
                                                   class="form-control"
                                                   value="{{  Carbon::parse($event->ends_at)->toDateString() }}"
                                                   required>
                                        </div>
                                        <div class="col">
                                            <label for="end_time">End Time</label>
                                            <input type="time" id="end_time" name="end_time"
                                                   value="{{  Carbon::parse($event->ends_at)->toTimeString() }}"
                                                   class="form-control" required>
                                        </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
