<div class="list-group">
    @forelse($contacts as $contact)
        <div class="list-group-item">
            <div class="flex flex-wrap w-full md:flex-row ">

                <div class="w-full md:w-2/4">
                    <div class="font-semibold text-warm-grey-0 text-sm md:text-base lg:text-lg">
                        {{ $contact->name }}
                    </div>
                    <div class="text-warm-grey-200 text-sm md:text-base">
                        {{ $contact->email }}
                    </div>
                </div>

                <form id="ADD_CONTACT_FORM_{{ $contact->id }}" method="POST" class="w-full md:w-2/4 md:flex md:justify-center"
                      action=" {{route('contacts.store', ['user_id' => $contact->id])}}">
                    @csrf

                    <div class="w-full justify-center md:w-1/2 md:self-center">
                        <select class="form-control cursor-pointer hover:bg-grey-lightest text-sm md:text-base" name="relationshipType"
                                form="ADD_CONTACT_FORM_{{ $contact->id }}">
                            @foreach($relationshipTypes as $relationshipType)
                                <option value="{{ $relationshipType->id }}">{{ $relationshipType->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full flex py-2 self-center justify-end md:w-1/2">
                        <button
                            class="btn bg-yellow-dark hover:bg-yellow text-white font-semibold text-sm shadow md:text-lg">
                            <i class="fas fa-save"></i> Add
                        </button>
                    </div>
                </form>


            </div>

        </div>
    @empty
        No contacts to show
    @endforelse
</div>
