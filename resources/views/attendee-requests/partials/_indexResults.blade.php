<div class="list-group">
    @forelse($requests as $request)
        <div class="list-group-item px-2">
            <div class="flex flex-col md:flex-row">

                <div class="w-full flex self-center p-2 rounded hover:bg-grey-light md:shadow-md md:w-3/4">
                    <a href="{{ route('event.show', $request->event ) }}"
                       class="text-decoration-none flex flex-row flex-wrap">
                        <div class="text-sm text-grey-darkest px-2 md:text-lg md:flex-shrink">
                            <i class="far fa-eye"></i>
                        </div>
                        <div class="text-sm font-bold align-self-center text-grey-darkest md:w-5/6">
                            {{ $request->event->name }}
                        </div>
                        <div class="hidden text-grey-darker text-sm md:block md:w-full">
                            {{ $request->event->description }}
                        </div>
                    </a>
                </div>

                <div class="w-full flex md:w-1/4">
                    <div class="mx-2 w-1/2 flex self-center justify-center">
                        <form action="{{ route('attendee-requests.decline', $request->id ) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn bg-red hover:bg-red-dark text-white text-sm shadow md:text-lg">
                                <i class="far fa-2x fa-calendar-times"></i>
                            </button>
                        </form>
                    </div>
                    <div class="w-1/2 flex self-center justify-center">
                        <form action="{{ route('attendee-requests.accept', ['attendee' => $request]) }}"
                              method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn text-white bg-yellow-dark hover:bg-yellow text-sm shadow md:text-lg">
                                <i class="far fa-2x fa-calendar-check"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="p-2">
            No Contact Requests
        </div>
    @endforelse
</div>
