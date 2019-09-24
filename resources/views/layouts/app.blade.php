<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Inveniet') }}</title>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	{{-- Font awesome --}}
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
	      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<div id="app">
	<inv-nav title="{{ config('app.name', 'Inveniet') }}" ></inv-nav>
{{--	<nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-primary shadow text-white">--}}
{{--		<div class="col-lg-12">--}}
{{--			<div class="row">--}}
{{--				<div class="">--}}
{{--					<a class="text-2xl text-center hover:bg-primary-dark rounded nav-link text-white"--}}
{{--					   href="{{ url('/') }}">--}}
{{--						{{ config('app.name', 'Inveniet') }}--}}
{{--					</a>--}}
{{--				</div>--}}
{{--				<div class="block lg:hidden">--}}
{{--					<button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">--}}
{{--						<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>--}}
{{--					</button>--}}
{{--				</div>--}}
{{--				<div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">--}}
{{--					<div class="text-sm lg:flex-grow">--}}
{{--						<a href="#responsive-header" class="block mt-4 text-white lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">--}}
{{--							Docs--}}
{{--						</a>--}}
{{--						<a href="#responsive-header" class="block mt-4 text-white lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">--}}
{{--							Examples--}}
{{--						</a>--}}
{{--						<a href="#responsive-header" class="block mt-4 text-white lg:inline-block lg:mt-0 text-teal-200 hover:text-white">--}}
{{--							Blog--}}
{{--						</a>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="col-lg-10" id="navbarSupportedContent">--}}
{{--					<!-- Left Side Of Navbar -->--}}
{{--					@auth--}}
{{--						<ul class="navbar-nav">--}}
{{--							<div class="btn-group mx-2 rounded bg-primary">--}}
{{--								<a href="{{ route('event.index') }}" class="hover:bg-primary-dark rounded">--}}
{{--									<button class="btn text-white" type="button">--}}
{{--										Events--}}
{{--									</button>--}}
{{--								</a>--}}
{{--								<button type="button" class="btn hover:bg-primary-dark text-white dropdown-toggle dropdown-toggle-split"--}}
{{--								        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--									<span class="sr-only">Toggle Dropdown</span>--}}
{{--								</button>--}}
{{--								<div class="dropdown-menu">--}}
{{--									<a href="{{ route('event.search') }}" class="dropdown-item">--}}
{{--										Search Events--}}
{{--									</a>--}}
{{--								</div>--}}
{{--							</div>--}}


{{--							<div class="btn-group mx-2 rounded bg-primary">--}}
{{--								<a href="{{ route('contacts.index') }}" class="hover:bg-primary-dark rounded">--}}
{{--									<button class="btn text-white" type="button">--}}
{{--										Relationships--}}
{{--									</button>--}}
{{--								</a>--}}
{{--								<button type="button" class="btn hover:bg-primary-dark text-white dropdown-toggle dropdown-toggle-split"--}}
{{--								        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--									<span class="sr-only">Toggle Dropdown</span>--}}
{{--								</button>--}}
{{--								<div class="dropdown-menu">--}}
{{--									<a href="{{ route('contacts.search') }}" class="dropdown-item">--}}
{{--										Search Contacts--}}
{{--									</a>--}}
{{--								</div>--}}
{{--							</div>--}}

{{--							<li class="nav-item hover:bg-primary-dark rounded mx-2 bg-primary">--}}
{{--								<a class="nav-link text-white " href="{{ route('relationship-requests.index') }}">Contact--}}
{{--								                                                                                  Requests</a>--}}
{{--							</li>--}}

{{--							<li class="nav-item hover:bg-primary-dark rounded mx-2 bg-primary">--}}
{{--								<a class="nav-link text-white " href="{{ route('attendee-requests.index') }}">Event--}}
{{--								                                                                              Requests</a>--}}
{{--							</li>--}}
{{--						</ul>--}}
{{--				@endauth--}}

{{--				<!-- Right Side Of Navbar -->--}}
{{--					<ul class="navbar-nav ml-auto text-white rounded">--}}


{{--						<!-- Authentication Links -->--}}
{{--						@guest--}}
{{--							<li class="nav-item">--}}
{{--								<a class="nav-link hover:bg-primary-dark rounded text-white" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--							</li>--}}
{{--							@if (Route::has('register'))--}}
{{--								<li class="nav-item">--}}
{{--									<a class="nav-link hover:bg-primary-dark rounded text-white"--}}
{{--									   href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--								</li>--}}
{{--							@endif--}}
{{--						@else--}}
{{--							<li class="nav-item dropdown">--}}
{{--								<a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"--}}
{{--								   role="button"--}}
{{--								   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--									{{ Auth::user()->name }} <span class="caret"></span>--}}
{{--								</a>--}}

{{--								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--									<a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--									   onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--										{{ __('Logout') }}--}}
{{--									</a>--}}

{{--									<form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--									      style="display: none;">--}}
{{--										@csrf--}}
{{--									</form>--}}
{{--								</div>--}}
{{--							</li>--}}
{{--						@endguest--}}

{{--					</ul>--}}
{{--				</div>--}}

{{--			</div>--}}
{{--		</div>--}}
{{--	</nav>--}}

	<main class="py-4">
		<div class="container">
			@if(Session::has('message'))
				<p class="alert alert-{{ Session::get('type', 'success') }} font-bold">{{ Session::get('message') }}</p>
			@endif
		</div>

		@yield('content')
	</main>
</div>

<script>
	window.CSRF = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
</script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
