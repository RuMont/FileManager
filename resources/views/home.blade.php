@include('components.head')
@include('components.header')
<main class="md:w-1/4 w-3/4 mx-auto">
  <section>
    <div class="my-12">
      <form method="POST" action="{{ url('auth') }}">
        @csrf
        <div class="mt-4">
          <div class="flex flex-col">
            <label class="text-slate-600 font-bold" for="email">
              Dirección de correo
            </label>
            <input
              class="p-3 rounded border border-slate-600/30 focus:shadow-inner
              focus:shadow-cyan-600/50 caret-cyan-600/50 outline-none"
              type="email" id="email" name="email" required>
          </div>
        </div>
        <div class="mt-4">
          <div class="flex flex-col">
            <label class="text-slate-600 font-bold" for="password">
              Contraseña
            </label>
            <div class="flex flex-row relative">
              <input
                class="p-3 w-full rounded border border-slate-600/30
                focus:shadow-inner focus:shadow-cyan-600/50 caret-cyan-600/50
                outline-none"
                type="password" id="password" name="password" required>
              {{-- Icono para ver la contraseña --}}
              <button type="button" id="togglePassword"
                class="absolute right-0 translate-y-2/4 mr-4 outline-none
                focus:shadow focus:rounded focus:shadow-cyan-600/50">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                  class="fill-cyan-600 hover:fill-cyan-500 h-6">
                  <path d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160
                    384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309
                    192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1
                    212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5
                    284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1
                    573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304
                    527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2
                    480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461
                    268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1
                    48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32
                    433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5
                    144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432
                    256C432 176.5 367.5 112 288 112z" />
                </svg>
              </button>
              <script defer src="../resources/js/togglePassword.js"></script>
            </div>
          </div>
        </div>
        <div class="mt-8 flex justify-center">
          <button
            class="w-full bg-cyan-600 hover:bg-cyan-500 rounded p-2
            text-slate-100 outline-none 
            focus:shadow-lg focus:shadow-cyan-600/50 disabled:bg-slate-200
            disabled:text-slate-400 disabled:shadow-none
            disabled:cursor-not-allowed"
            id="submitbtn" type="submit">Iniciar sesión</button>
        </div>
        <p class="text-rose-500 text-center mt-4 font-bold" id="message"></p>
        {{-- Script propio --}}
        <script defer src="../resources/js/loginasync.js"></script>
        @if ($errors->any())
          <div>
            <p class="text-rose-500 text-center mt-4 font-bold">
              {{ $errors->all(':message')[0] }}
            </p>
          </div>
        @endif
      </form>
    </div>
  </section>
  @include('components.footer')