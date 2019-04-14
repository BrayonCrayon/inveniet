@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="list-group">
                        @forelse($requests as $request)
                            <div class="list-group-item">

                                <div class="flex justify-between">
                                    <div class="">
                                        {{ $request->user->name }}
                                    </div>
                                    <div class="">
                                        {{ $request->type->name }}
                                    </div>

                                    <div class="">
                                        <form action="{{ route('relationship-requests.accept', ['relationship' => $request]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn bg-green-dark hover:bg-green-darker text-green-lightest">
                                                Accept
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
    </div>
@endsection

