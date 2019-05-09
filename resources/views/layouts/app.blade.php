<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head >
	<meta charset="utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1" >

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}" >

	<title >{{ config('app.name', 'Inveniet') }}</title >

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" >

	{{-- Font awesome --}}
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
	      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" >
</head >
<body >
<div id="app" >
	<nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-primary shadow text-white" >
		<div class="col-lg-12" >
			<div class="row" >
				<div class="col-lg-1" >
					<a class="navbar-primary text-2xl hover:bg-primary-dark rounded nav-link text-white" href="{{ url('/') }}" >
						{{ config('app.name', 'Laravel') }}
					</a >
					{{--						<button class="navbar-toggler" type="button" data-toggle="collapse"--}}
					{{--						        data-target="#navbarSupportedContent"--}}
					{{--						        aria-controls="navbarSupportedContent" aria-expanded="false"--}}
					{{--						        aria-label="{{ __('Toggle navigation') }}" >--}}
					{{--							<span class="navbar-toggler-icon" ></span >--}}
					{{--						</button >--}}
				</div >

				<div class="col-lg-10 collapse navbar-collapse" id="navbarSupportedContent" >
					<!-- Left Side Of Navbar -->
					@auth
						<ul class="navbar-nav" >
							<li class="nav-item hover:bg-primary-dark rounded" >
								<a class="nav-link text-white " href="{{ route('event.search') }}" >Events</a >
							</li >

							<li class="nav-item hover:bg-primary-dark rounded" >
								<a class="nav-link text-white "
								   href="{{ route('contacts.search') }}" >Relationships</a >
							</li >

							<li class="nav-item hover:bg-primary-dark rounded" >
								<a class="nav-link text-white " href="{{ route('relationship-requests.index') }}" >Contact
								                                                                                   Requests</a >
							</li >

							<li class="nav-item hover:bg-primary-dark rounded" >
								<a class="nav-link text-white " href="{{ route('attendee-requests.index') }}" >Event
								                                                                               Requests</a >
							</li >
						</ul >
				@endauth

				<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto text-white" >


						<!-- Authentication Links -->
						@guest
							<li class="nav-item" >
								<a class="nav-link text-white" href="{{ route('login') }}" >{{ __('Login') }}</a >
							</li >
							@if (Route::has('register'))
								<li class="nav-item" >
									<a class="nav-link text-white" href="{{ route('register') }}" >{{ __('Register') }}</a >
								</li >
							@endif
						@else
							<li class="nav-item dropdown" >
								<a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
								   role="button"
								   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre >
									{{ Auth::user()->name }} <span class="caret" ></span >
								</a >

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
									<a class="dropdown-item" href="{{ route('logout') }}"
									   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
										{{ __('Logout') }}
									</a >

									<form id="logout-form" action="{{ route('logout') }}" method="POST"
									      style="display: none;" >
										@csrf
									</form >

									<a href="{{ route('contacts.index') }}"
									   class="dropdown-item" >
										My Relationship's
									</a >
									<a href="{{ route('event.index') }}"
									   class="dropdown-item" >
										My Events
									</a >
								</div >
							</li >
						@endguest

					</ul >
				</div >

			</div >
		</div >
	</nav >

	<main class="py-4" >
		<div class="container" >
			@if(Session::has('message'))
				<p class="alert alert-{{ Session::get('type', 'success') }} font-bold" >{{ Session::get('message') }}</p >
			@endif
		</div >

		@yield('content')
	</main >
</div >

<script >
    window.CSRF = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
</script >

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer ></script >
</body >
</html >
