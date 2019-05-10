<div class="list-group" >
	@forelse($contacts as $contact)
		<div class="list-group-item" >
			<div class="col-12" >
				<div class="row" >
					<div class="col-4" >
						<div >
							<div class="font-bold text-grey-darkest" >
								{{ $contact->name }}
							</div >
							<div class="text-grey-dark text-sm" >
								{{ $contact->email }}
							</div >
						</div >
					</div >
					<inv-relationship-status
							relationship-type="{{ auth()->user()->contactRelationship($contact->id)->type->name }}"
							relationship-status="{{ auth()->user()->contactRelationship($contact->id)->status->name }}" ></inv-relationship-status >

					<div class="col-2 d-flex align-items-center" >
						<form id="DELETE_CONTACT_FORM_{{ $contact->id }}"
						      method="POST"
						      action="{{route('contacts.destroy', ['user_id' => $contact->id])}}" >
							@csrf
							@method('DELETE')

							<button
									class="btn bg-red-dark hover:bg-red text-white font-bold text-lg shadow" >
								<i class="fas fa-dumpster-fire" ></i > Delete
							</button >
						</form >
					</div >
				</div >
			</div >

		</div >
	@empty
		No contacts to show
	@endforelse
</div >
