@extends('layouts.app')


@section('content')

	<div class="container">
		<div class="col-12">
			<div class="row">
				<div class="col">
					<div class="card text-grey-darkest">
						<div class="card-body">
							<div class="timeline-border-gradient">
								@include('event.partials._searchHeader')
								@include('event.partials._results')
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="container flex justify-center my-3">
					{{ $events->links() }}
				</div>
			</div>
		</div>
	</div>



@endsection
