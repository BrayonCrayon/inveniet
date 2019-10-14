@extends('layouts.app')


@section('content')

	<div class="container">
		<div class="flex w-full justify-center">
			<div class="card shadow w-full sm:w-3/4 lg:w-1/2">
				<div class="card-body">
					<div class="flex self-end justify-between border-warm-grey-500 border-b-2 mb-2 p-2">
						<div class="self-center text-warm-grey-0 text-sm md:text-lg lg:text-xl ">
							<i class="fas fa-calendar-plus"></i> {{ $event->name }}
						</div>
						<form action="{{ route('event.destroy', ['id' => $event->id]) }}" method="POST">
							@csrf
							@method('DELETE')
							<button class="btn text-sm text-white font-semibold bg-red hover:bg-red-dark rounded md:text-base lg:text-lg">
								<i class="fas fa-dumpster-fire"></i>
                                <div class="hidden md:inline-block">
                                    Delete
                                </div>
							</button>
						</form>
					</div>
					<form action="{{ route('event.update', $event ) }}" method="POST">
						@csrf
						@method('PUT')

						<inv-form-group label="Name" name="name" value="{{ old('name', $event->name) }}"
						                error-text="{{ $errors->first('name') }}"></inv-form-group>

						<inv-form-group label="Address" name="address"
						                value="{{ old('address', $event->address) }}"
						                error-text="{{ $errors->first('address') }}"></inv-form-group>

						<inv-form-group label="Description" name="description"
						                type="textarea"
						                value="{{  old('description', $event->description) }}"
						                error-text="{{ $errors->first('description') }}">
						</inv-form-group>

						<inv-form-group label="RSVP" name="rsvp_by" type="dateTime"
						                value="{{ old('rsvp_by', Carbon::parse($event->rsvp_by)->format('c')) }}"
						                error-text="{{ $errors->first('rsvp-by') }}"
						></inv-form-group>

						<inv-form-group label="Starts At" name="starts_at" type="dateTime"
						                value="{{ old('starts_at', Carbon::parse($event->starts_at)->format('c')) }}"
						                error-text="{{$errors->first('starts_at')}}"
						></inv-form-group>

						<inv-form-group label="Ends At" name="ends_at" type="dateTime"
						                value="{{ old('ends_at', Carbon::parse($event->ends_at)->format('c')) }}"
						                error-text="{{$errors->first('ends_at')}}"
						></inv-form-group>

						<div class="form-group">
							<inv-event-repeated :value="{{ $event->repeated }}"
							                    :current-type="{{ $event->repeated_type_id  }}"
							                    :types="{{ $repeatedTypes }}"></inv-event-repeated>
						</div>

						<div class="flex justify-end">
							<a href="{{ route('event.index') }}"
							   class="btn bg-yellow-lighter hover:bg-yellow-light font-semibold text-red-darkest shadow-md text-sm md:text-base lg:text-lg mr-2">
								Cancel
							</a>

							<button class="btn bg-yellow-dark hover:bg-yellow text-white font-semibold shadow-md text-sm md:text-base lg:text-lg">
								Update
							</button>
						</div>
					</form>


					<div class="flex flex-row justify-between mt-10 mb-2 border-grey border-b-2">
						<div class="self-end text-sm md:text-lg lg:text-2xl font-bold">
							<i class="fas fa-user-friends"></i>Attendees
						</div>

						<div class="pb-1">
							<inv-attendee-modal :event-id="{{ $event->id }}"
							                    :is-host="{{auth()->user()->isEventHost($event->id) ? 'true' : 'false'}}"></inv-attendee-modal>
						</div>
					</div>


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
												<button class="btn bg-red hover:bg-red-dark text-white font-bold text-xs md:text-base lg:text-lg shadow my-1">
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

@endsection
