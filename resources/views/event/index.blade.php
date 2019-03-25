@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="col-12">

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="flex justify-between">
                                <h3>My Events</h3>

                                <inv-button link="{{ route('event.create') }}">
                                    <i class="fas fa-plus"></i> Create Event Button
                                </inv-button>
                            </div>
                            <hr>
                            <div class="list-group">
                                @foreach($events as $event)

                                    <div class="list-group-item">

                                        <div class="flex justify-between mb-3">
                                            <h4 class="font-bold">{{ $event->name }}</h4>

                                            <div class="text-grey-dark">
                                                {{ $event->starts_at_diff }}
                                            </div>
                                        </div>

                                        <p>{{ $event->description }}</p>

                                        <div class="flex">
                                            <inv-button link="{{ route('event.show', ['id' => $event->id]) }}">
                                                <i class="fas fa-search-location"></i> Take a look
                                            </inv-button>

                                            <inv-button link="{{ route('event.edit', ['id' => $event->id]) }}" class="mx-2">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </inv-button>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container flex justify-center my-3">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>



@endsection
