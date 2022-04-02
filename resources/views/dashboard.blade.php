@include('components.head')
@include('components.header')
<main class="md:w-1/4 w-3/4 mx-auto">
  <section>
    <div class="my-12 text-center">
      <form method="POST" id="form">
        <h1 class="text-2xl font-bold">Generar ficheros</h1>
        <div class="flex flex-col sm:flex-row justify-around my-4">
          <div class="flex flex-col">
            <label for="date1">Desde el día:</label>
            <input
              class="mt-4 rounded font-bold p-2 outline-none focus:shadow-inner
            border border-slate-600/30 focus:shadow-cyan-600/50"
              type="date" id="date1" required>
          </div>

          <div class="flex flex-col">
            <label for="date2">Hasta el día:</label>
            <input
              class="mt-4 rounded font-bold p-2 outline-none focus:shadow-inner
            border border-slate-600/30 focus:shadow-cyan-600/50"
              type="date" id="date2" required>
          </div>
        </div>
        <h3 class="text-2xl font-bold mt-8">Seleccione qué ficheros desea generar</h3>
        <div class="my-4">

          <div class="rounded bg-slate-700 flex flex-row justify-between w-5/6 mx-auto p-1 m-2">
            <label class="text-slate-100 self-center text-left w-full" for="btncheck1">Ventas</label>
            <input class="accent-cyan-600 bg-slate-700 h-8 w-8" type="checkbox" id="btncheck1">
          </div>

          <div class="rounded bg-slate-700 flex flex-row justify-between w-5/6 mx-auto p-1 m-2">
            <label class="text-slate-100 self-center text-left w-full" for="btncheck2">Clientes</label>
            <input class="accent-cyan-600 bg-slate-700 h-8 w-8" type="checkbox" id="btncheck2">
          </div>

          <div class="rounded bg-slate-700 flex flex-row justify-between w-5/6 mx-auto p-1 m-2">
            <label class="text-slate-100 self-center text-left w-full" for="btncheck3">Proveedores</label>
            <input class="accent-cyan-600 bg-slate-700 h-8 w-8" type="checkbox" id="btncheck3">
          </div>
        </div>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div>
          <button
            class="w-full bg-cyan-600 hover:bg-cyan-500 rounded p-2
          text-slate-100 outline-none 
          focus:shadow-lg focus:shadow-cyan-600/50 disabled:bg-slate-200
          disabled:text-slate-400 disabled:shadow-none
          disabled:cursor-not-allowed"
            id="submitbtn">Generar
            ficheros</button>
        </div>
        {{-- Script propio --}}
        <script defer src="../resources/js/ficherosasync.js"></script>
        {{-- Librería para descargar archivos --}}
        <script defer src="../resources/js/download.js"></script>
        <p class="mt-4 text-cyan-600 font-bold" id="message"></p>
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
