@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="flex w-full justify-center">
            <div class="card w-5/6 shadow lg:w-3/4">
                <div class="card-body">
                    @include('contacts.partials._indexHeader')

                    @include('contacts.partials._indexResults')

                    <div class="row">
                        <div class="container flex justify-center my-3">
                            {{ $contacts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
