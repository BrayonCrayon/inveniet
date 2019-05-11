@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="card-title"><i class="fas fa-inbox"></i>Requests</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group">
                                @forelse($requests as $request)
                                    <div class="list-group-item">

                                        <div class="col-lg-12 rounded">
                                            <div class="row my-1">

                                                <div class="col-4">
                                                    <div class="font-bold text-grey-darkest">
                                                        {{ $request->user->name }}
                                                    </div>
                                                    <div class="text-grey-dark text-sm">
                                                        {{ $request->user->email }}
                                                    </div>
                                                </div>

                                                <inv-relationship-status
                                                        relationship-type="{{ $request->type->name }}"
                                                        relationship-status="{{ $request->status->name }}"></inv-relationship-status>

                                                <div class="col-2 d-flex align-items-center ">
                                                    <form action="" class="mr-2">
                                                        <button class="btn hover:bg-red-lightest text-red-dark text-2xl"><i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('relationship-requests.accept', ['relationship' => $request]) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <button class="btn  text-green-dark hover:bg-green-lightest text-2xl">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>


                                                </div>
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
            </div>
        </div>
    </div>
@endsection
