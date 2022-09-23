<div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalEdit">Editar Datos de conectividad de {{ $network -> Nombre }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" method="post" action="{{ route('network.update', $network -> Secuencial) }}">
              @csrf
              <input type="hidden" name="_method" value="PUT">
              <div class="col-md form-floating mb-3">
                    <select name="inputDominio" id="inputDominio" class="form-select">
                        <option selected value="">Elegir</option>
                        <option value="lan.tungurahua.gob.ec"> lan.tungurahua.gob.ec </option>
                        <option value="BIBLIOTECA"> BIBLIOTECA </option>
                        <option value="WORKGROUP"> WORKGROUP </option>
                    </select>
                    <label for="inputDominio" class="form-label">Dominio</label>
                </div>

              <div class="col-md form-floating mb-3">
                    <select name="inputConectividad" id="inputConectividad" class="form-select">
                        <option selected value="">Elegir</option>
                        <option value="1"> Si </option>
                        <option value="0"> No </option>
                    </select>
                    <label for="inputConectividad" class="form-label">Conectividad</label>
              </div>

              <div class="col-md-4">
                <label for="inputIP" class="form-label">Direccion IP</label>
                <input type="text" class="form-control" name="inputIP" value="{{ $network -> IP }}"></input>
              </div>

              <div class="col-12">
                <label for="inputMAC" class="form-label">Direccion MAC</label>
                <input type="text" class="form-control" name="inputMAC" value="{{ $network -> MAC }}"></input>
              </div>

              <div class="col-md form-floating mb-3">
                    <select name="inputConectividadImpresora" id="inputConectividadImpresora" class="form-select">
                        <option selected value="">Elegir</option>
                        <option value="1"> Si </option>
                        <option value="0"> No </option>
                    </select>
                    <label for="inputConectividadImpresora" class="form-label">Conectividad</label>
              </div>

              <div class="col-md-4 mb-3">
                <label for="inputMarca" class="form-label">Marca</label>
                <select name="MarcaImpresora" id="MarcaImpresora" class="form-select">
                  <option selected value="">Elegir</option>
                  @foreach ($marcas as $marca)
                  <option value="{{ $marca->Secuencial }}"> {{ $marca ->Nombre }} </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-4">
                <label for="inputIPImpresora" class="form-label">Direccion IP de la impresora</label>
                <input type="text" class="form-control" name="inputIPImpresora" value="{{ $network -> IPImpresora }}"></input>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>

              <input type="hidden" name="inputSecuencial" value="{{ $network -> Secuencial }}">
            </form>

          </div>

        </div>
      </div>
      
    </div>