@include('components.head')
@include('components.header')
<section>
  <div class="container">
    <form class="p-5" method="POST" action="{{ url('register') }}">
      @csrf
      <div class="row">
        <div class="form-floating mb-3 col-lg-7 mx-auto">
          <input type="email" class="form-control" id="email" name="email" required>
          <label class="ms-3" for="email">Correo electrónico</label>
        </div>
      </div>
      <div class="row">
        <div class="form-floating mb-3 col-lg-7 mx-auto">
          <input type="text" class="form-control" id="nombre" name="nombre" required>
          <label class="ms-3" for="nombre">Nombre</label>
        </div>
      </div>
      <div class="row">
        <div class="form-floating mb-3 col-lg-7 mx-auto">
          <input type="password" class="form-control" id="password" name="password" required>
          <label class="ms-3" for="password">Contraseña</label>
        </div>
      </div>
      <div class="row">
        <button type="submit" class="btn btn-dark col-11 col-lg-6 mx-auto">Registrar</button>
      </div>
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
