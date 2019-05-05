<div class="list-group" >
	@forelse($contacts as $contact)
		<div class="list-group-item" >
			<div class="col-12" >
				<div class="row" >
					<div class="col-8" >
						<div class="row" >
							<div class="col-12" >
								<div class="font-bold text-grey-darkest" >
									{{ $contact->name }}
								</div >
								<div class="text-grey-dark text-sm" >
									{{ $contact->email }}
								</div >
							</div >
							@if( auth()->user()->isContact($contact->id) )
								<inv-relationship-status
										relationship-type="{{ auth()->user()->contactRelationship($contact->id)->type->name }}"
										relationship-status="{{ auth()->user()->contactRelationship($contact->id)->status->name }}" ></inv-relationship-status >
							@endif
						</div >
					</div >
					<div class="col-4" >
						<div class="row justify-content-end" >
							@if( auth()->user()->isContact($contact->id) )
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
							@else
								<form id="ADD_CONTACT_FORM_{{ $contact->id }}" method="POST"
								      action=" {{route('contacts.store', ['user_id' => $contact->id])}}" >
									@csrf

									<div class="row" >
										<div class="relative ml-02" >
											<select name="relationshipType"
											        class="block appearance-none w-full bg-grey-light border border-grey-light text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
											        form="ADD_CONTACT_FORM_{{ $contact->id }}" >
												@foreach($relationshipTypes as $relationshipType)
													<option value="{{ $relationshipType->id }}" >{{ $relationshipType->name  }}</option >
												@endforeach
											</select >
											<div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker" >
												<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
												     viewBox="0 0 20 20" >
													<path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
												</svg >
											</div >
										</div >

										<button
												class="btn bg-green-dark hover:bg-green text-green-lightest font-bold text-lg shadow" >
											<i class="fas fa-save" ></i > Add
										</button >
									</div >
								</form >
							@endif
						</div >
					</div >
				</div >
			</div >

		</div >
	@empty
		No contacts to show
	@endforelse
</div >
