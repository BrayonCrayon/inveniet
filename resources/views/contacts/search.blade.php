@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col-12">
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-body">
							@include('contacts.partials._searchHeader')

							@include('contacts.partials._results')
							<div class="row">
								<div class="container flex justify-center my-3">
									{{ $contacts->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
