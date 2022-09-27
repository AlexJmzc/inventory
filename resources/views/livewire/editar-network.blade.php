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
              <div class="col-md-4 mb-3">
                <label for="inputDominio" class="form-label">Dominio</label>
                <select name="inputDominio" id="inputDominio" class="form-select">
                    <option selected value="">Elegir</option>
                    @switch($network -> Dominio)
                        @case('lan.tungurahua.gob.ec')
                          <option value="lan.tungurahua.gob.ec" selected="selected"> lan.tungurahua.gob.ec </option>
                          <option value="BIBLIOTECA"> BIBLIOTECA </option>
                          <option value="WORKGROUP"> WORKGROUP </option>
                        @break

                        @case('BIBLIOTECA')
                          <option value="lan.tungurahua.gob.ec"> lan.tungurahua.gob.ec </option>
                          <option value="BIBLIOTECA" selected="selected"> BIBLIOTECA </option>
                          <option value="WORKGROUP"> WORKGROUP </option>
                        @break

                        @case('WORKGROUP')
                          <option value="lan.tungurahua.gob.ec"> lan.tungurahua.gob.ec </option>
                          <option value="BIBLIOTECA"> BIBLIOTECA </option>
                          <option value="WORKGROUP" selected="selected"> WORKGROUP </option>
                        @break
                    @endswitch
                </select>
                </div>

              <div class="col-md-4 mb-3">
                <label for="inputConectividad" class="form-label">Conectividad</label>
                <select name="inputConectividad" id="inputConectividad" class="form-select" defaultValue="{{$network -> PoseeConectividad}}">
                    <option selected value="">Elegir</option>   
                    @if($network -> PoseeConectividad == 1)
                      <option value="1" selected="selected"> Si </option>
                      <option value="0"> No </option>
                    @else
                      <option value="1"> Si </option>
                      <option value="0" selected="selected"> No </option>
                    @endif
                </select>
              </div>

              <div class="col-md-4">
                <label for="inputIP" class="form-label">Direccion IP</label>
                <input type="text" class="form-control" name="inputIP" value="{{ $network -> IP }}"></input>
              </div>

              <div class="col-12">
                <label for="inputMAC" class="form-label">Direccion MAC</label>
                <input type="text" class="form-control" name="inputMAC" value="{{ $network -> MAC }}"></input>
              </div>

              <div class="col-md-4 mb-3">
                <label for="inputConectividadImpresora" class="form-label">Conectividad</label>
                <select name="inputConectividadImpresora" id="inputConectividadImpresora" class="form-select">
                    <option selected value="">Elegir</option>   
                    @if($network -> ConectividadImpresora == 1)
                      <option value="1" selected="selected"> Si </option>
                      <option value="0"> No </option>
                    @else
                      <option value="1"> Si </option>
                      <option value="0" selected="selected"> No </option>
                    @endif
                </select>
              </div>

              <div class="col-md-4 mb-3">
                <label for="inputMarca" class="form-label">Marca</label>
                <select name="MarcaImpresora" id="MarcaImpresora" class="form-select">
                  <option selected value="">Elegir</option>
                    @foreach ($marcas as $marca)
                        @if($network -> MarcaImpresora == $marca -> Secuencial )
                          <option value="{{ $marca-> Secuencial }}" selected="selected"> {{ $marca -> Nombre }} </option>
                        @else
                          <option value="{{ $marca-> Secuencial }}"> {{ $marca -> Nombre }} </option>
                        @endif
                    @endforeach
                </select>
              </div>

              <div class="col-md-4">
                <label for="inputIPImpresora" class="form-label">IP Impresora</label>
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