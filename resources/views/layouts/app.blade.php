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
<body class="bg-yellow-whitest">
<div id="app" >
	<nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-white shadow text-white p-0">
		@include("layouts.partials._appNav")
	</nav>

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
