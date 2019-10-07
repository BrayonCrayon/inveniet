@extends('layouts.app')


@section('content')

	<div class="container">
		<div class="flex w-full justify-center">
			<div class="card shadow w-full sm:w-3/4 lg:w-1/2">
				<div class="card-body">
					<div class="flex justify-between">
						<h3><i class="fas fa-calendar-plus"></i> Create Event</h3>
					</div>
					<hr>
					<form action="{{ route('event.store') }}" method="POST">
						@csrf

						<inv-form-group label="Name" name="name"
						                error-text="{{ $errors->first('name') }}"
										value="{{ old('name')  }}"
						></inv-form-group>

						<inv-form-group label="Address" name="address"
						                error-text="{{ $errors->first('address') }}"
										value="{{ old('address') }}"
						></inv-form-group>

						<inv-form-group label="Description" name="description" type="textarea"
						                error-text="{{ $errors->first('description') }}"
						                value="{{ old('description') }}"
						></inv-form-group>

						<inv-form-group label="RSVP" name="rsvp_by" type="dateTime"
						                required
						                value="{{ old('rsvp_by') ? Carbon::parse(old('rsvp_by'))->format('c') : ''  }}"
						                error-text="{{ $errors->first('rsvp_by') }}"
						></inv-form-group>

						<inv-form-group label="Starts At" name="starts_at" type="dateTime"
						                required
						                value="{{ old('starts_at') ? Carbon::parse(old('starts_at'))->format('c') : '' }}"
						                error-text="{{ $errors->first('starts_at') }}"
						></inv-form-group>

						<inv-form-group label="Ends At" name="ends_at" type="dateTime"
						                required
						                value="{{ old('ends_at') ? Carbon::parse(old('ends_at'))->format('c') : '' }}"
						                error-text="{{ $errors->first('ends_at') }}"
						></inv-form-group>

						<div class="form-group">
							<inv-event-repeated :types="{{ $repeatedTypes }}"></inv-event-repeated>
						</div>

						<div class="flex justify-end">
							<a href="{{ route('event.index') }}"
							   class="btn bg-red-dark hover:bg-red text-white font-bold shadow text-sm md:text-base lg:text-lg mr-2">
								Cancel
							</a>

							<button class="btn bg-green-dark hover:bg-green text-green-lightest font-bold text-sm md:text-base lg:text-lg shadow">
								<i class="fas fa-save"></i> Save
							</button>
						</div>


					</form>
				</div>
			</div>
		</div>
	</div>



@endsection
