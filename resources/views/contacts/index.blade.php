@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">My Relationships</h3>

                            <div class="list-group">
                                @foreach($contacts as $contact)
                                    <div class="list-group-item">
                                       <div class="font-bold text-grey-darkest">
                                           {{ $contact->name }}
                                       </div>
                                        <div class="text-grey-dark text-sm">
                                            {{ $contact->email }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
