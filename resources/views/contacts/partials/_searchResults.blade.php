<div class="list-group shadow">
    @forelse($contacts as $contact)
        <div class="list-group-item">
            <div class="col-12">
                <div class="row">
                    <div class="col-4">
                        <div class="font-bold text-grey-darkest">
                            {{ $contact->name }}
                        </div>
                        <div class="text-grey-dark text-sm">
                            {{ $contact->email }}
                        </div>
                    </div>
                    <div class="col">
                        <form id="ADD_CONTACT_FORM_{{ $contact->id }}" method="POST"
                              action=" {{route('contacts.store', ['user_id' => $contact->id])}}">
                            @csrf

                            <div class="row">
                                <div class="col-4 relative">
                                    <select class="form-control cursor-pointer hover:bg-grey-lightest" name="relationshipType"
                                            form="ADD_CONTACT_FORM_{{ $contact->id }}">
                                        @foreach($relationshipTypes as $relationshipType)
                                            <option value="{{ $relationshipType->id }}">{{ $relationshipType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col flex justify-center">
                                    <button
                                            class="btn bg-green-dark hover:bg-green text-green-lightest font-bold text-lg shadow">
                                        <i class="fas fa-save"></i> Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    @empty
        No contacts to show
    @endforelse
</div>
