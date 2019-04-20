@extends('layouts.app')


@section('content')

	{{--  TODO: Replace code below with a vue modal. --}}
	<div class="col-12" >
		<div class="row" >
			<div class="col" >
				<form method="GET" action="/user/search" >
					@csrf
					<inv-text-input name="search" placeholder="Search For New Users" />
				</form >
			</div >


			<div class="col" >
				<div class="flex justify-end" >
					{{--TODO: THIS BUTTON WILL INITIATE THE MODAL.--}}
					<button class="btn bg-green-dark hover:bg-green text-white font-bold text-lg shadow" >
						Invite
					</button >
				</div >
			</div >
		</div >
		<div class="list-group" >
			@forelse($usersToInvite as $user)
				<div class="list-group-item" >
					<div class="col-12" >
						<div class="row" >
							<div class="col" >
								{{$user->name}}
							</div >
							<div class="col" >
								{{--Form's Action will hold 'attendee.store', to store the newly added attendee to the event.--}}
								<form method="POST" action="" >
									@csrf
									<button class="btn bg-green-dark hover:bg-green text-white font-bold text-lg shadow" >
										Invite To Event
									</button >
								</form >
							</div >
						</div >
					</div >
				</div >
			@empty
				No People to Invite
			@endforelse
		</div >
	</div >


@endsection
