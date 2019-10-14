<div class="list-group" >
	@forelse($contacts as $contact)
		<div class="list-group-item" >
			<div class="flex flex-wrap w-full" >
					<div class="w-full md:w-1/3 md:self-center" >
							<div class="font-semibold text-warm-grey-0 text-sm md:text-lg" >
								{{ $contact->name }}
							</div >
							<div class="text-sm text-warm-grey-200 md:text-base" >
								{{ $contact->email }}
							</div >
					</div >
					<inv-relationship-status class="w-full md:w-1/3"
							relationship-type="{{ auth()->user()->contactRelationship($contact->id)->type->name }}"
							relationship-status="{{ auth()->user()->contactRelationship($contact->id)->status->name }}" ></inv-relationship-status >

					<div class="w-full flex self-center justify-end md:w-1/3" >
						<form id="DELETE_CONTACT_FORM_{{ $contact->id }}"
						      method="POST"
						      action="{{route('contacts.destroy', $contact )}}" >
							@csrf
							@method('DELETE')

							<button
									class="btn text-sm text-white font-semibold bg-yellow-dark hover:bg-yellow rounded md:text-base lg:text-lg" >
                                Remove
							</button >
						</form >
					</div >
			</div >

		</div >
	@empty
		No contacts to show
	@endforelse
</div >
