<li class="nav-item">
	<a class="nav-link hover:bg-primary-dark rounded text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
</li>
@if (Route::has('register'))
	<li class="nav-item">
		<a class="nav-link hover:bg-primary-dark rounded text-white"
		   href="{{ route('register') }}">{{ __('Register') }}</a>
	</li>
@endif
