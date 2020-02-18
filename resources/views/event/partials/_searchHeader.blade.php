<div class="ml-5 mb-3">
    <div class="flex flex-col">
        <div class="w-full flex">
            <div class="w-1/2 self-center text-warm-grey-0 text-xl md:text-2xl">
                <i class="fas fa-calendar-day pr-2"></i>Events
            </div>
            <div class="w-1/2 flex justify-end text-xs md:text-base">
                <inv-button link="{{ route('event.create') }}"
                            color="rounded outline-none bg-yellow-dark text-white hover:bg-yellow p-2 m-0">
                    <i class="fas fa-plus p-1"></i>
                    <div class="md:inline-block hidden">Create Event</div>
                </inv-button>
            </div>
        </div>

        <form method="GET" action="{{ route('event.search') }}" class="w-full">
            @csrf
            <inv-input-search url-path="{{ route('event.search') }}" value="{{ isset($search) ? $search : '' }}"></inv-input-search>
        </form>


    </div>
</div>
