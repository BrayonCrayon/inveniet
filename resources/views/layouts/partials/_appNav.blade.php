<inv-nav
    @auth
    auth
    user-name="{{ auth()->user()->name }}"
    @endauth
></inv-nav>
