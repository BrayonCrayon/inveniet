@extends('layouts.app')


@section('content')

	<div class="container">
		<div class="col-12">
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-body">
							<div class="flex justify-between">
								<h3><i class="fas fa-calendar-plus"></i> {{ $event->name }}</h3>
								@if(!auth()->user()->isAttending($event->id ))
									<form action="{{ route('attendee.store', ['userInvites' => [auth()->user()->id], 'eventId' => $event->id ]) }}"
									      method="POST">
										@method('POST')
										@csrf
										<button class="btn bg-green-dark hover:bg-green text-white font-bold text-lg shadow">
											<i class="fas fa-calendar-plus mr-2"></i>Attend
										</button>
									</form>
								@else
									<form action="{{ route('attendee.destroy', auth()->user()->getUserAttendee($event->id) ) }}"
									      method="POST">
										@method('DELETE')
										@csrf
										<button class="btn hover:bg-red-lightest text-red-darkest text-lg">
											<i class="fas fa-dumpster-fire mr-2"></i>Leave Event
										</button>
									</form>
								@endif
							</div>
							<hr>
							<inv-form-group label="Name" name="name" value="{{ $event->name }}"
							                is-disabled></inv-form-group>

							<inv-form-group label="Address" name="address"
							                value="{{ $event->address }}" is-disabled></inv-form-group>

							<inv-form-group label="Description" name="description"
							                type="textarea"
							                value="{{  $event->description }}" is-disabled>
							</inv-form-group>

							<inv-form-group label="RSVP" name="rsvp_by"
							                value="{{ Carbon::parse($event->rsvp_by)->toDayDateTimeString() }}"
							                is-disabled></inv-form-group>

							<div class="form-group">
								<div class="row">
									<inv-form-group label="Start Date" name="start_date" class="col-6"
									                type="date"
									                value="{{  Carbon::parse($event->starts_at)->toDateString() }}"
									                is-disabled>
									</inv-form-group>
									<inv-form-group label="Start Time" name="start_time" class="col-6"
									                type="time"
									                value="{{ Carbon::parse($event->starts_at)->toTimeString() }}"
									                is-disabled>
									</inv-form-group>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<inv-form-group label="End Date" name="end_date" class="col-6"
									                type="date"
									                value="{{  Carbon::parse($event->ends_at)->toDateString() }}"
									                is-disabled>
									</inv-form-group>
									<inv-form-group label="End Time" name="end_time" class="col-6"
									                type="time"
									                value="{{ Carbon::parse($event->ends_at)->toTimeString() }}"
									                is-disabled>
									</inv-form-group>
								</div>
							</div>

							<div class="form-group">
								<inv-event-repeated :value="{{ $event->repeated }}"
								                    :current-type="{{ $event->repeated_type_id  }}"
								                    :types="{{ \App\RepeatedType::all() }}" disabled></inv-event-repeated>

							</div>

							<div class="col mt-10">
								<div class="row">
									<h3><i class="fas fa-user-friends"></i>Attendees</h3>
								</div>
							</div>
							<hr>
							<list-group-scrollable>
								@foreach($attendees as $attendee)
									<div class="list-group-item border-0">
										<div class="col-12">
											<div class="row">
												<div class="col-4">
													<div class="font-bold text-grey-darkest">
														{{ $attendee->user->name }}
													</div>
													<div class="text-grey-dark text-sm">
														{{ $attendee->user->email }}
													</div>
												</div>
												<inv-attendee-status attendee-type="{{ $attendee->attendeeType->name }}"
												                     attendee-status="{{ $attendee->attendeeStatus->name }}"></inv-attendee-status>
											</div>
										</div>
										<hr>
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
