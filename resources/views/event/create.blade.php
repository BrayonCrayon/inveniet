@extends('layouts.app')


@section('content')

	<div class="container">
		<div class="col-12">
			<div class="row">
				<div class="col">
					<div class="card shadow">
						<div class="card-body">
							<div class="flex justify-between">
								<h3><i class="fas fa-calendar-plus"></i> Create Event</h3>
							</div>
							<hr>
							<form action="{{ route('event.store') }}" method="POST">
								@csrf

								<inv-form-group label="Name" name="name"></inv-form-group>

								<inv-form-group label="Address" name="address"></inv-form-group>

								<inv-form-group label="Description" name="description" type="textarea"></inv-form-group>

								<inv-form-group label="RSVP" name="rsvp_by" type="date"></inv-form-group>


								<div class="flex flex-wrap">
									<inv-form-group label="Start Date" name="start_date" class="w-full md:w-1/2 md:pr-2"
									                type="date" required>
									</inv-form-group>
									<inv-form-group label="Start Time" name="start_time" class="w-full md:w-1/2"
									                type="time" required>
									</inv-form-group>
								</div>

								<div class="flex flex-wrap">
									<inv-form-group label="End Date" name="end_date" class="w-full md:w-1/2 md:pr-2"
									                type="date" required>
									</inv-form-group>
									<inv-form-group label="End Time" name="end_time" class="w-full md:w-1/2"
									                type="time" required>
									</inv-form-group>
								</div>


								<div class="form-group">
									<inv-event-repeated :types="{{ \App\RepeatedType::all() }}"></inv-event-repeated>
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
		</div>
	</div>



@endsection
