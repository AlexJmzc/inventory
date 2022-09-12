@extends('layouts.app')

@section('content')
<!-- Button trigger modal -->

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div>
  <div class="modal fade modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Accesorio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3" method="POST" action="{{ route('accesorios.store') }}">
            @csrf
            <div class="col-md-7 form-group">
              <label for="inputCodigo" class="form-label">Código</label>
              <input type="text" class="form-control" name="inputCodigo" required>
            </div>
            <div class="col-md-5">
              <label for="inputTipo" class="form-label">Tipo de Accesorio</label>
              <select name="inputTipo" class="form-select" required>
              <option selected disabled value="">Elige</option>
                @foreach($tipo as $accesorio)
                <option>{{$accesorio->Nombre}} </option>
                @endforeach

              </select>
            </div>

            <div class="col-md-4">
              <label for="inputMarca" class="form-label">Marca</label>
              <input type="text" class="form-control" name="inputMarca" required>
            </div>
            <div class="col-md-4">
              <label for="inputModelo" class="form-label">Modelo</label>
              <input type="text" class="form-control" name="inputModelo">
            </div>
            <div class="col-md-4">
              <label for="inputSerie" class="form-label">Serie</label>
              <input type="text" class="form-control" name="inputSerie">
            </div>

            <div class="col-12">
              <label for="inputDescripcion" class="form-label">Descripción</label>
              <textarea class="form-control" name="inputDescripcion" rows="2"></textarea>
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>


          </form>

        </div>

      </div>
    </div>
  </div>
</div>

@endsection