<div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalEdit">Editar {{ $programa -> Nombre }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" method="POST" action="">
              @csrf
              <div class="col-md form-floating mb-3">
                    <select name="inputDominio" id="inputDominio" class="form-select">
                        <option selected value="">Elegir</option>
                        <option value="1"> 32 </option>
                        <option value="2"> 64 </option>
                    </select>
                    <label for="inputDominio" class="form-label">Bits</label>
                </div>

                <div class="col-md form-floating mb-3">
                    <select name="inputDominio" id="inputDominio" class="form-select">
                        <option selected value="">Elegir</option>
                        <option value="1"> Si </option>
                        <option value="0"> No </option>
                    </select>
                    <label for="inputDominio" class="form-label">Licenciado</label>
                </div>
              <div class="col-md-4">
                <label for="inputModelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="inputModelo">{{ $accesorio -> Modelo }}</input>
              </div>
              <div class="col-md-4">
                <label for="inputSerie" class="form-label">Serie</label>
                <input type="text" class="form-control" name="inputSerie">{{ $accesorio -> Serie }}</input>
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