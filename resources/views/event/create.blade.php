@extends('layouts.app')


@section('content')

	<div class="container" >
		<div class="col-12" >
			<div class="row" >
				<div class="col" >
					<div class="card shadow" >
						<div class="card-body" >
							<div class="flex justify-between" >
								<h3 ><i class="fas fa-bong" ></i > Create Event</h3 >
							</div >
							<hr >
							<form action="{{ route('event.store') }}" method="POST" >
								@csrf

								<div class="form-group" >
									<inv-label target="name" >Name</inv-label >
									<inv-text-input name="name" ></inv-text-input >
								</div >

								<inv-form-group label="Name" name="name" ></inv-form-group >

								<div class="form-group" >
									<label for="address" >Address</label >
									<input type="text" id="address" name="address"
									       class="form-control" required >
								</div >

								<div class="form-group" >
									<label for="description" >Description</label >
									<textarea id="description" name="description" cols="30" rows="4"
									          class="form-control"
									          required >
                                    </textarea >
								</div >
								<div class="form-group" >
									<label for="rsvp_by" >RSVP</label >
									<input type="date" id="rsvp_by" name="rsvp_by"
									       class="form-control" required >
								</div >
								<div class="form-group" >
									<div class="row" >
										<div class="col-6" >
											<label for="start_date" >Start Date</label >
											<input type="date" id="start_date" name="start_date"
											       class="form-control" required >
										</div >
										<div class="col" >
											<label for="start_time" >Start Time</label >
											<input type="time" id="start_time" name="start_time" class="form-control" >
										</div >
									</div >
								</div >

								<div class="form-group" >
									<div class="row" >
										<div class="col-6" >
											<label for="end_date" >End Date</label >
											<input type="date" id="end_date" name="end_date"
											       class="form-control" required >
										</div >
										<div class="col" >
											<label for="end_time" >End Time</label >
											<input type="time" id="end_time" name="end_time" class="form-control" >
										</div >
									</div >
								</div >

								<div class="flex justify-end" >
									<a href="{{ route('event.index') }}"
									   class="btn bg-red-dark hover:bg-red text-red-lightest font-bold text-lg shadow mx-2" >
										Cancel
									</a >

									<button class="btn bg-green-dark hover:bg-green text-green-lightest font-bold text-lg shadow" >
										<i class="fas fa-save" ></i > Save
									</button >
								</div >


							</form >
						</div >
					</div >
				</div >
			</div >
		</div >
	</div >



@endsection
