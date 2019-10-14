@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">
                            @include('relationship-requests.partials._indexHeader')
                            @include('relationship-requests.partials._indexResults')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
