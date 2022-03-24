@include('components.head')
@include('components.header')
<section>
  <div class="container">
    <form class="p-5 text-center" method="POST" id="form">
      <h1 class="mb-5">Generar ficheros</h1>
      <div class="col-11 col-lg-6 mx-auto d-flex mb-5 justify-content-evenly flex-wrap">
        <div class="d-flex flex-column text-start">
          <label for="date1">Fecha de inicio</label>
          <input type="date" class="form-control m-1" id="date1" required>
        </div>

        <div class="d-flex flex-column text-start">
          <label for="date2">Fecha de fin</label>
          <input type="date" class="form-control m-1" id="date2" required>
        </div>
      </div>
      <h3 class="mb-5">Seleccione qué ficheros desea generar:</h3>
      <div class="btn-group col-11 col-lg-5 mx-auto">

        <input type="checkbox" class="btn-check" id="btncheck1">
        <label class="btn btn-outline-dark" for="btncheck1">Ventas</label>

        <input type="checkbox" class="btn-check" id="btncheck2">
        <label class="btn btn-outline-dark" for="btncheck2">Clientes</label>

        <input type="checkbox" class="btn-check" id="btncheck3">
        <label class="btn btn-outline-dark" for="btncheck3">Proveedores</label>
      </div>
      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
      <div class="row">
        <button id="submitbtn" class="btn btn-lg btn-outline-dark col-9 col-lg-6 mx-auto mt-5">Generar
          ficheros</button>
      </div>
      {{-- Script propio --}}
      <script defer src="../resources/js/ficherosasync.js"></script>
      {{-- Librería para descargar archivos --}}
      <script defer src="../resources/js/download.js"></script>
      <p class="text-success fw-bold mt-1" id="message"></p>
      @if ($errors->any())
        <div class="row mt-3">
          <div class="col-11 col-lg-6 mx-auto text-center border rounded">
            <p class="text-danger p-3 fw-bold mb-0">{{ $errors->all(':message')[0] }}</p>
          </div>
        </div>
      @endif
    </form>
  </div>
</section>
@include('components.footer')
