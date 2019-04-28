<div class="list-group">
    @forelse($contacts as $contact)
        <div class="list-group-item">
            <div class="col-12">
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-7">
                                <div class="font-bold text-grey-darkest">
                                    {{ $contact->name }}
                                </div>
                                <div class="text-grey-dark text-sm">
                                    {{ $contact->email }}
                                </div>
                            </div>
                            @if( auth()->user()->isContact($contact->id) )
                                <div class="col text-grey-darkest">
                                    <div class="font-bold">
                                        Relation:
                                    </div>
                                    {{ auth()->user()->contactRelationship($contact->id)->type->name }}
                                </div>

                                <div class="col  text-grey-darkest">
                                    <div class="font-bold">Status:
                                    </div> {{ auth()->user()->contactRelationship($contact->id)->status->name }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row justify-content-end">
                            @if( auth()->user()->isContact($contact->id) )
                                <form id="DELETE_CONTACT_FORM_{{ $contact->id }}"
                                      method="POST"
                                      action="{{route('contacts.destroy', ['user_id' => $contact->id])}}">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                            class="btn bg-red-dark hover:bg-red text-white font-bold text-lg shadow">
                                        <i class="fas fa-dumpster-fire"></i> Delete
                                    </button>
                                </form>
                            @else
                                <form id="ADD_CONTACT_FORM_{{ $contact->id }}" method="POST"
                                      action=" {{route('contacts.store', ['user_id' => $contact->id])}}">
                                    @csrf
                                    <select name="relationshipType"
                                            form="ADD_CONTACT_FORM_{{ $contact->id }}">
                                        @foreach($relationshipTypes as $relationshipType)
                                            <option value="{{ $relationshipType->id }}">{{ $relationshipType->name  }}</option>
                                        @endforeach
                                    </select>

                                    <button
                                            class="btn bg-green-dark hover:bg-green text-green-lightest font-bold text-lg shadow">
                                        <i class="fas fa-save"></i> Add
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @empty
        No contacts to show
    @endforelse
</div>
