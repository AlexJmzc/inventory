@extends('layouts.app')

@section('content')
<!-- Button trigger modal -->

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div>
  <div class="modal fade modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Accesorio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form class="row g-3">

              <div class="col-md-6">
                <label for="inputCity" class="form-label">Código</label>
                <input type="text" class="form-control" id="inputCity">
              </div>
              <div class="col-md-4">
                <label for="inputState" class="form-label">Tipo de Accesorio</label>
                <select id="inputState" class="form-select">
                  <option selected>Seleccionar</option>
                  @foreach($accesorios as $accesorio)
                  <option>{{$accesorio->Secuencial}} </option>
                  @endforeach

                </select>
              </div>

              <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Marca</label>
                <input type="email" class="form-control" id="inputEmail4">
              </div>
              <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="inputPassword4">
              </div>
              <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Serie</label>
                <input type="password" class="form-control" id="inputSerie">
              </div>

              <div class="col-10">
                <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
              </div>

              <div class="col-10">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection