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
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" value="{{ $event->name }}"
                                           class="form-control cursor-not-allowed" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" value="{{ $event->address }}"
                                           class="form-control cursor-not-allowed" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" cols="30" rows="4"
                                              class="form-control cursor-not-allowed"
                                              disabled>{{ $event->description }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="rsvp_by">RSVP</label>
                                    <input type="text" id="rsvp_by" name="rsvp_by" value="{{  Carbon::parse($event->rsvp_by)->toDayDateTimeString()  }}"
                                           class="form-control cursor-not-allowed" disabled>
                                </div>
                                <div class="form-group">
                                   <div class="row">
                                       <div class="col-6">
                                           <label for="starts_at">Starts at</label>
                                           <input type="text" id="starts_at" name="starts_at" value="{{ Carbon::parse($event->starts_at)->toDayDateTimeString() }}"
                                                  class="form-control cursor-not-allowed" disabled>
                                       </div>
                                       <div class="col">
                                           <label for="ends_at">Ends at</label>
                                           <input type="text" id="ends_at" name="ends_at" value="{{  Carbon::parse($event->ends_at)->toDayDateTimeString()  }}"
                                                  class="form-control cursor-not-allowed" disabled>
                                       </div>
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
