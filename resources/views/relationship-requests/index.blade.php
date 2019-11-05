@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                @include('relationship-requests.partials._indexHeader')
                @include('relationship-requests.partials._indexResults')
            </div>
        </div>
    </div>
@endsection
