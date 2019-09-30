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
							<div class="flex flex-row">

									<div class="w-2/4 self-center shadow-md p-2 rounded hover:bg-grey-light md:w-3/4">
										<a href="{{ route('event.show', $request->event ) }}"
										   class="text-decoration-none">
											<div class="text-sm font-bold text-grey-darkest">
												{{ $request->event->name }}
											</div>
											<div class="hidden text-grey-darker text-sm md:block">
												{{ $request->event->description }}
											</div>
										</a>
									</div>

									<div class="w-2/4 flex justify-end md:w-1/4">
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
