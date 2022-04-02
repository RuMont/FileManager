<nav class="h-16 sticky top-0 bg-slate-800 p-4 shadow-lg shadow-slate-800/30 text-slate-100">
  <div class="flex flex-row justify-between">
    <ul>
      @auth
        @if (Auth::user()->is_admin == 1 && Route::currentRouteName() != 'register')
          {{-- Únicamente se puede acceder con una cuenta administrador, se cambia en phpmyadmin --}}
          <li>
            <a class="bg-cyan-600 hover:bg-cyan-500 p-1 rounded" href="{{ url('register') }}">Crear cuenta</a>
          </li>
        @endif
        @if (Route::currentRouteName() == 'register')
          {{-- Únicamente se puede acceder con una cuenta administrador, se cambia en phpmyadmin --}}
          <li>
            <a class="bg-cyan-600 hover:bg-cyan-500 p-1 rounded" href="{{ url('dashboard') }}">Tablero</a>
          </li>
        @endif
      @endauth
    </ul>
    @auth
      <div>
        <span>{{ Auth::user()->email }}</span>
        <a class="border border-rose-500 p-1 rounded text-rose-500 m-2" href="{{ url('logout') }}">Cerrar sesión</a>
      </div>
    @endauth
  </div>
</nav>
@if (session('status'))
  <div class="bg-cyan-600 animate__animated animate__fadeOutUp animate__delay-3s">
    <p class="text-center m-0 text-slate-100">{{ session('status') }}</p>
  </div>
@endif
