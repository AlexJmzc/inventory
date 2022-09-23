<div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalEdit">Editar datos de {{ $equipo -> Nombre }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" method="post" action="{{ route('equipo.update', $equipo -> Secuencial) }}">
              @csrf
              <input type="hidden" name="_method" value="PUT">
              <div class="col-md-4 mb-3">
                <label for="inputResponsable" class="form-label">Responsable</label>
                <select name="Responsable" id="Responsable" class="form-select">
                  <option selected value="">Elegir</option>
                    @foreach ($responsables as $responsable)
                    <option value="{{ $responsable -> Cedula }}"> {{ $responsable -> NombreCompleto }} </option>
                    @endforeach
                </select>
              </div>

              <div class="col-md-4">
                <label for="inputCodigo" class="form-label">Código</label>
                <input type="text" class="form-control" name="inputCodigo" value="{{ $equipo -> Codigo }}"></input>
              </div>

              <div class="col-md form-floating mb-3">
                    <select name="inputTipo" id="inputTipo" class="form-select">
                        <option selected value="">Elegir</option>
                        <option value="1"> ESCRITORIO </option>
                        <option value="2"> PORTATIL </option>
                    </select>
                    <label for="inputTipo" class="form-label">Tipo</label>
              </div>

              <div class="col-md-4 mb-3">
                <label for="inputMarca" class="form-label">Marca</label>
                <select name="MarcaEquipo" id="MarcaEquipo" class="form-select">
                  <option selected value="">Elegir</option>
                    @foreach ($marcas as $marca)
                    <option value="{{ $marca->Secuencial }}"> {{ $marca ->Nombre }} </option>
                    @endforeach
                </select>
              </div>

              <div class="col-md-4">
                <label for="inputModelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="inputModelo" value="{{ $equipo -> Modelo }}"></input>
              </div>

              <div class="col-md-4">
                <label for="inputSerie" class="form-label">Serie</label>
                <input type="text" class="form-control" name="inputSerie" value="{{ $equipo -> Serie }}"></input>
              </div>

              <div class="col-md-4">
                <label for="inputObservacion" class="form-label">Observacion</label>
                <input type="text" class="form-control" name="inputObservacion" value="{{ $equipo -> Observacion }}"></input>
              </div>

              <div class="col-md-4 mb-3">
                <label for="inputProcesador" class="form-label">Procesador</label>
                <select name="Procesador" id="Procesador" class="form-select">
                  <option selected value="">Elegir</option>
                    @foreach ($procesadores as $procesador)
                    <option value="{{ $procesador -> Secuencial }}"> {{ $procesador -> NombreProcesador }} </option>
                    @endforeach
                </select>
              </div>

              <div class="col-md-4">
                <label for="inputMemoria" class="form-label">Memoria</label>
                <input type="text" class="form-control" name="inputMemoria" value="{{ $equipo -> CapacidadMemoria }}"></input>
              </div>

              <div class="col-md-4">
                <label for="inputCapacidadDisco1" class="form-label">Disco 1</label>
                <input type="text" class="form-control" name="inputCapacidadDisco1" value="{{ $equipo -> CapacidadDisco1 }}"></input>
              </div>

              <div class="col-md-4 mb-3">
                <label for="inputMarcaDisco1" class="form-label">Marca Disco 1</label>
                <select name="MarcaDisco1" id="MarcaDisco1" class="form-select">
                  <option selected value="">Elegir</option>
                  @foreach ($marcas as $marca)
                  <option value="{{ $marca->Secuencial }}"> {{ $marca ->Nombre }} </option>
                  @endforeach
                </select>
              </div>

              @if($equipo -> MarcaDisco2 == NULL)
                <div class="col-md-4 mb-3">
                    <label for="inputMarcaDisco2" class="form-label">Marca Disco 2</label>
                    <select name="MarcaDisco2" id="MarcaDisco2" class="form-select">
                    <option selected value="">Elegir</option>
                    @foreach ($marcas as $marca)
                    <option value="{{ $marca->Secuencial }}"> {{ $marca ->Nombre }} </option>
                    @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="inputCapacidadDisco2" class="form-label">Disco 2</label>
                    <input type="text" class="form-control" name="inputCapacidadDisco2" value=""></input>
                </div>
              @else
                <div class="col-md-4 mb-3">
                    <label for="inputMarcaDisco2" class="form-label">Marca Disco 2</label>
                    <select name="MarcaDisco2" id="MarcaDisco2" class="form-select">
                    <option selected value="">Elegir</option>
                    @foreach ($marcas as $marca)
                    <option value="{{ $marca->Secuencial }}"> {{ $marca ->Nombre }} </option>
                    @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="inputCapacidadDisco2" class="form-label">Disco 2</label>
                    <input type="text" class="form-control" name="inputCapacidadDisco2" value="{{ $equipo -> CapacidadDisco1 }}"></input>
                </div>
              @endif
              <input type="hidden" name="inputSecuencial" value="{{ $equipo -> Secuencial }}">
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>

            </form>

          </div>

        </div>
      </div>
    </div>