@extends('layouts.app')

@section('content')

	<div class="container" >
		<div class="col-12" >
			<div class="row" >
				<div class="col" >
					<div class="card" >
						<div class="card-body" >
							<div class="col-12" >
								<div class="row" >
									<div class="col-6" >
										<h3 class="card-title " >My Relationships</h3 >
									</div >
									<div class="col-6" >
										<div class="row" >
											<div class="col-2 align-self-center" >
												<a href="{{ route('contacts.index') }}"
												   class="contents-baseline text-grey-darkest" >
													Clear
												</a >
											</div >
											<div class="col" >
												<form method="GET" action="/contacts/search" >
													@csrf
													<inv-text-input name="search" placeHolder="Search For Users" />
												</form >
											</div >
										</div >
									</div >
								</div >
							</div >

							<div class="list-group" >
								@foreach($contacts as $contact)
									<div class="list-group-item" >
										<div class="col-12" >
											<div class="row" >
												<div class="col-6" >
													<div class="row" >
														<div class="col" >
															<div class="font-bold text-grey-darkest" >
																{{ $contact->name }}
															</div >
															<div class="text-grey-dark text-sm" >
																{{ $contact->email }}
															</div >
														</div >
														@if( auth()->user()->isContact($contact->id) )
															<div class="col font-bold text-grey-darkest" >
																Relation: {{ auth()->user()->contactRelationship($contact->id) }}
															</div >
														@endif
													</div >
												</div >
												<div class="col-6" >
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
																<select name="relationshipType"
																        form="ADD_CONTACT_FORM_{{ $contact->id }}" >
																	@foreach($relationshipTypes as $relationshipType)
																		<option value="{{ $relationshipType->id }}" >{{ $relationshipType->name  }}</option >
																	@endforeach
																</select >

																<button
																		class="btn bg-green-dark hover:bg-green text-green-lightest font-bold text-lg shadow" >
																	<i class="fas fa-save" ></i > Add
																</button >
															</form >
														@endif
													</div >
												</div >
											</div >
										</div >

									</div >
								@endforeach
							</div >

						</div >
					</div >
				</div >
			</div >
		</div >
	</div >

@endsection
