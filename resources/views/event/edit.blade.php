@extends('layouts.app')


@section('content')

	<div class="container">
		<div class="col-12">
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-body">
							<div class="flex justify-between">
								<div class="self-center text-sm md:text-lg lg:text-2xl ">
									<i class="fas fa-calendar-plus"></i> {{ $event->name }}
								</div>
								<form action="{{ route('event.destroy', ['id' => $event->id]) }}" method="POST">
									@csrf
									@method('DELETE')
									<button class="btn text-sm md:text-base hover:bg-red-lightest text-red-darkest lg:text-lg">
										<i class="fas fa-dumpster-fire"></i> Delete
									</button>
								</form>
							</div>
							<hr>
							<form action="{{ route('event.update', $event ) }}" method="POST">
								@csrf
								@method('PUT')

								<inv-form-group label="Name" name="name" value="{{ $event->name }}"></inv-form-group>

								<inv-form-group label="Address" name="address"
								                value="{{ $event->address }}"></inv-form-group>

								<inv-form-group label="Description" name="description"
								                type="textarea"
								                value="{{  $event->description }}">
								</inv-form-group>

								<inv-form-group label="RSVP" name="rsvp_by"
								                value="{{ Carbon::parse($event->rsvp_by)->toDayDateTimeString() }}"
								></inv-form-group>

								<div class="flex flex-wrap">
									<inv-form-group label="Start Date" name="start_date" class="w-full md:w-1/2 md:pr-2"
									                type="date"
									                value="{{  Carbon::parse($event->starts_at)->toDateString() }}">
									</inv-form-group>
									<inv-form-group label="Start Time" name="start_time" class="w-full md:w-1/2"
									                type="time"
									                value="{{ Carbon::parse($event->starts_at)->toTimeString() }}">
									</inv-form-group>
								</div>

								<div class="flex flex-wrap">
									<inv-form-group label="End Date" name="end_date" class="w-full md:w-1/2 md:pr-2"
									                type="date"
									                value="{{  Carbon::parse($event->ends_at)->toDateString() }}">
									</inv-form-group>
									<inv-form-group label="End Time" name="end_time" class="w-full md:w-1/2"
									                type="time"
									                value="{{ Carbon::parse($event->ends_at)->toTimeString() }}">
									</inv-form-group>
								</div>

								<div class="form-group">
									<inv-event-repeated :value="{{ $event->repeated }}"
									                    :current-type="{{ $event->repeated_type_id  }}"
									                    :types="{{ \App\RepeatedType::all() }}"></inv-event-repeated>
								</div>

								<div class="flex justify-end">
									<a href="{{ route('event.index') }}"
									   class="btn bg-red-dark hover:bg-red text-white font-bold shadow text-sm md:text-base lg:text-lg mr-2">
										Cancel
									</a>

									<button class="btn bg-green-dark hover:bg-green text-white font-bold shadow text-sm md:text-base lg:text-lg">
										Update
									</button>
								</div>
							</form>


							<div class="flex flex-row justify-between mt-10">
								<div class="self-center text-sm md:text-lg lg:text-2xl font-bold">
									<i class="fas fa-user-friends"></i>Attendees
								</div>

									<div class="mx-2">
										<inv-attendee-modal :event-id="{{ $event->id }}"
										                    :is-host="{{auth()->user()->isEventHost($event->id) ? 'true' : 'false'}}"></inv-attendee-modal>
									</div>
							</div>
							<hr>


							<list-group-scrollable>
								@foreach($attendees as $attendee)
									<div class="list-group-item border-0">
										<div class="flex flex-wrap">
												<div class="w-3/4">
														<div class="text-sm font-bold text-grey-darkest md:text-base">
															{{ $attendee->user->name }}
														</div>
														<div class="text-grey-dark text-xs md:text-sm">
															{{ $attendee->user->email }}
														</div>
												</div>
												<div class="w-1/4 flex justify-end">
													@if(auth()->user()->isEventHost($event->id) && auth()->user()->id !== $attendee->user_id)
														<form action="{{ route('attendee.destroy',  $attendee ) }}"
														      method="POST">
															@csrf
															@method('DELETE')
															<button class="btn bg-red-dark hover:bg-red text-white font-bold text-xs md:text-base lg:text-lg shadow my-1">
																<i class="fa fa-user-times"></i>
															</button>
														</form>
													@endif
												</div>
											<div class="w-full">
												<inv-attendee-status attendee-type="{{ $attendee->attendeeType->name }}"
												                     attendee-status="{{ $attendee->attendeeStatus->name }}"></inv-attendee-status>
											</div>
											</div>
										<hr class="p-0 mb-0">
									</div>

								@endforeach
							</list-group-scrollable>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
