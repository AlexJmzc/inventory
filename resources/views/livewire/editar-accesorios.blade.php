<div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalEdit">Editar {{ $accesorio -> Tipo }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" method="POST" action="">
              @csrf
              <div class="col-md-7 form-group">
                <label for="inputCodigo" class="form-label">Código</label>
          
                <input type="text" class="form-control" name="inputCodigo" required value="{{ $accesorio -> Codigo }}"></input>
              </div>

              <div class="col-md-4 mb-3">
                <label for="inputTipo" class="form-label">Marca</label>
                <select name="MarcaAccesorioNuevo" id="MarcaAccesorioNuevo" class="form-select">
                  <option selected value="">Elegir</option>
                  @foreach ($marcas as $marca)
                  <option value="{{ $marca->Secuencial }}"> {{ $marca ->Nombre }} </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-4">
                <label for="inputModelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="inputModelo" value="{{ $accesorio -> Modelo }}"></input>
              </div>
              <div class="col-md-4">
                <label for="inputSerie" class="form-label">Serie</label>
                <input type="text" class="form-control" name="inputSerie" value="{{ $accesorio -> Serie }}"></input>
              </div>

              <div class="col-12">
                <label for="inputDescripcion" class="form-label">Descripción</label>
                @if($accesorio -> Descripcion == null || $accesorio -> Descripcion == '')
                    <textarea class="form-control" name="inputDescripcion" rows="2"></textarea>
                @else
                    <textarea class="form-control" name="inputDescripcion" rows="2">{{ $accesorio -> Descripcion }}</textarea>
                @endif
                
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>

            </form>

          </div>

        </div>
      </div>
    </div>