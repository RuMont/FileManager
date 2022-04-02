@include('components.head')
@include('components.header')
<main class="md:w-1/4 w-3/4 mx-auto">
<section>
  <div class="my-12">
    <form method="POST" action="{{ url('register') }}">
      @csrf
      <div class="mt-4">
        <div class="flex flex-col">
          <label class="text-slate-600 font-bold" for="email">Correo electrónico</label>
          <input class="p-3 rounded border border-slate-600/30 focus:shadow-inner
              focus:shadow-cyan-600/50 caret-cyan-600/50 outline-none" type="email" id="email" name="email" required>
        </div>
      </div>
      <div class="mt-4">
        <div class="flex flex-col">
          <label class="text-slate-600 font-bold" for="nombre">Nombre</label>
          <input class="p-3 rounded border border-slate-600/30 focus:shadow-inner
              focus:shadow-cyan-600/50 caret-cyan-600/50 outline-none" type="text" id="nombre" name="nombre" required>
        </div>
      </div>
      <div class="mt-4">
        <div class="flex flex-col">
          <label class="text-slate-600 font-bold" for="password">Contraseña</label>
          <input class="p-3 rounded border border-slate-600/30 focus:shadow-inner
              focus:shadow-cyan-600/50 caret-cyan-600/50 outline-none" type="password" id="password" name="password" required>
        </div>
      </div>
      <div class="mt-8 flex justify-center">
        <button class="w-full bg-cyan-600 hover:bg-cyan-500 rounded p-2
        text-slate-100 outline-none 
        focus:shadow-lg focus:shadow-cyan-600/50 disabled:bg-slate-200
        disabled:text-slate-400 disabled:shadow-none
        disabled:cursor-not-allowed" type="submit">Completar registro</button>
      </div>
      @if ($errors->any())
        <div>
          <div>
            <p>{{ $errors->all(':message')[0] }}</p>
          </div>
        </div>
      @endif
    </form>
  </div>
</section>
@include('components.footer')
