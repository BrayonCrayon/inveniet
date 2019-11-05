@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card shadow">
			<div class="card-body">
                @include('attendee-requests.partials._indexHeader')
                @include('attendee-requests.partials._indexResults')
			</div>
		</div>
	</div>


@endsection
