@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col">
                    <div class="card text-grey-darkest">
                        <div class="card-body">
                            <div class="timeline-border-gradient">
                                <div class="ml-5 mb-3">
                                    <div class="flex justify-between">
                                        <h2>My Events</h2>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-2 align-self-center">
                                                    <a href="{{ route('event.index') }}"
                                                       class="btn hover:bg-green-lightest text-grey-darkest text-lg">
                                                        Clear
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <form method="GET" action="/event/search">
                                                        @csrf
                                                        <inv-text-input name="search" placeholder="Search For New Events"/>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <inv-button link="{{ route('event.create') }}" color="grey-outline">
                                            <i class="fas fa-plus"></i>
                                            <span class="md:inline-block hidden">Create Event</span>
                                        </inv-button>

                                    </div>
                                </div>
                                @foreach($events as $event)
                                    <div class="border-t ml-5"></div>
                                    <div class="flex  w-full ">
                                        <div class="timeline-ball md:mt-5 mt-8"></div>
                                        <div class="py-5 pl-5 w-full">
                                            <div class="flex justify-between  mb-3 items-baseline">

                                                <div class="flex flex-col items-baseline">
                                                    <h4 class="md:font-bold font-semibold text-grey-darker">{{ $event->name }}</h4>
                                                    <div class="text-grey-dark">
                                                        {{ $event->starts_at_diff }}
                                                    </div>
                                                </div>
                                                <div class="contents-baseline text-grey-darkest ml-2 flex">
                                                    <a href="{{ route('event.edit', ['id' => $event->id]) }}"
                                                       class="btn hover:bg-green-lightest text-grey-darkest text-lg">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('event.destroy', ['id' => $event->id]) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn hover:bg-red-lightest text-red-darkest text-lg">
                                                            <i class="fas fa-dumpster-fire"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>

                                            <p>{{ $event->description }}</p>

                                            <div class="flex my-2">
                                                <inv-button link="{{ route('event.show', ['id' => $event->id]) }}"
                                                            color="grey">
                                                    <i class="fas fa-search-location"></i> Check it out
                                                </inv-button>
                                                <inv-button color="grey" class="mx-2">
                                                    <i class="far fa-calendar-plus"></i> Add to Calendar
                                                </inv-button>


                                            </div>
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
