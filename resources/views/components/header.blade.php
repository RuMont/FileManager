<nav class="sticky-top navbar navbar-expand-lg navbar-light bg-dark" style="min-height: 4rem">
  <div class="container-fluid d-flex flex-row">
    <ul class="navbar-nav">
      @auth
        @if (Auth::user()->is_admin == 1)
          {{-- Únicamente se puede acceder con una cuenta administrador, se cambia en phpmyadmin --}}
          <li class="nav-item">
            <a href="{{ url('register') }}" class="btn btn-sm btn-outline-light">Crear cuenta</a>
          </li>
        @endif
        @if (Route::currentRouteName() == 'register')
          {{-- Únicamente se puede acceder con una cuenta administrador, se cambia en phpmyadmin --}}
          <li class="nav-item">
            <a href="{{ url('dashboard') }}" class="btn btn-sm btn-outline-light">Tablero</a>
          </li>
        @endif
      @endauth
    </ul>
    @auth
      <div class="d-flex">
        <span class="text-light nav-link">{{ Auth::user()->email }}</span>
        <a href="{{ url('logout') }}" class="btn btn-outline-danger">Logout</a>
      </div>
    @endauth
  </div>
</nav>
@if (session('status'))
  <div class="row bg-success animate__animated animate__fadeOutUp animate__delay-3s">
    <p class="text-center text-light m-0 p-2">{{ session('status') }}</p>
  </div>
@endif
