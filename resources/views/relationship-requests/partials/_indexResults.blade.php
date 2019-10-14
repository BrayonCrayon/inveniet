<div class="list-group">
    @forelse($requests as $request)
        <div class="list-group-item">

            <div class="flex flex-wrap w-full rounded">

                    <div class="w-full self-center md:w-1/3">
                        <div class="font-semibold text-warm-grey-0 text-sm md:text-lg lg:text-xl">
                            {{ $request->user->name }}
                        </div>
                        <div class="text-warm-grey-200 text-sm md:text-base">
                            {{ $request->user->email }}
                        </div>
                    </div>

                    <inv-relationship-status class="w-full md:w-1/3"
                        relationship-type="{{ $request->type->name }}"
                        relationship-status="{{ $request->status->name }}"></inv-relationship-status>

                    <div class="w-full flex self-center justify-around md:w-1/3">
                        <div class="w-1/2 flex self-center justify-center">
                            <form action="{{ route('contacts.destroy', $request->user_id ) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn bg-red-dark hover:bg-red text-white text-sm md:text-2xl">
                                    <i class="fas fa-ban"></i>
                                </button>
                            </form>
                        </div>
                        <div class="w-1/2 flex self-center justify-center">
                            <form action="{{ route('relationship-requests.accept', ['relationship' => $request]) }}"
                                  method="POST">
                                @csrf
                                @method('PUT')

                                <button class="btn bg-yellow-dark text-white hover:bg-yellow text-sm md:text-2xl">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                        </div>
                    </div>
            </div>

        </div>
    @empty
        <i class="fas fa-sad-cry"></i> No Contact Requests
    @endforelse
</div>
