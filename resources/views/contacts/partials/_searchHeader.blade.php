<div class="flex flex-col border-warm-grey-500 border-b-2 mb-2 p-2">
    <div class="w-full flex">
        <div class="self-center text-xl md:text-2xl">
            <i class="fas fa-user-friends pr-2"></i>Relationships
        </div>
    </div>
    <form method="GET" action="{{ route('contacts.search') }}" class="w-full">
        @csrf
        <inv-input-search url-path="{{ route('contacts.search') }}"
                          value="{{ isset($search) ? $search : '' }}"></inv-input-search>
    </form>
</div>
