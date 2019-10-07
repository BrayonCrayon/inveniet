@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-body">
				<div class="flex flex-row">
					<div class="card-title md:text-2xl">
						<i class="fas fa-archive pr-2"></i>Event Requests
					</div>
				</div>

				<div class="list-group">
					@forelse($requests as $request)
						<div class="list-group-item px-2">
							<div class="flex flex-col md:flex-row">

									<div class="w-full flex self-center p-2 rounded hover:bg-grey-light md:shadow-md md:w-3/4">
										<a href="{{ route('event.show', $request->event ) }}"
										   class="text-decoration-none flex flex-row flex-wrap">
											<div class="text-sm text-grey-darkest px-2 md:text-lg md:flex-shrink">
												<i class="far fa-eye"></i>
											</div>
											<div class="text-sm font-bold align-self-center text-grey-darkest md:w-5/6">
												{{ $request->event->name }}
											</div>
											<div class="hidden text-grey-darker text-sm md:block md:w-full">
												{{ $request->event->description }}
											</div>
										</a>
									</div>

									<div class="w-full flex justify-around md:justify-end md:w-1/4">
										<form action="" class="mr-2">
											<button class="btn hover:bg-red-lightest text-red-dark text-2xl"><i
														class="fas fa-trash"></i>
											</button>
										</form>
										<form action="{{ route('attendee-requests.accept', ['attendee' => $request]) }}"
										      method="POST">
											@csrf
											@method('PUT')
											<button class="btn text-green-dark hover:bg-green-lightest text-2xl">
												<i class="fas fa-check"></i>
											</button>
										</form>
									</div>
							</div>
						</div>
					@empty
						<i class="fas fa-sad-cry"></i> No Contact Requests
					@endforelse
				</div>
			</div>
		</div>
	</div>


@endsection
