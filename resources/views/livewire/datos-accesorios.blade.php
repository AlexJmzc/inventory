<div class="container text-center">
  <div class="d-flex mb-4">
    <div class="p-2 flex-grow-1">
      <h3><span class="badge bg-secondary">{{$accesorios[0] -> NombreEquipo}}</span></h3>
    </div>

    <div class="p-2">
      <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>
        Añadir
      </button>
    </div>

  </div>




  <div class="row">
    @foreach($accesorios as $accesorio)
    <div class="col">
      <div class="card border-success mb-3">
        <div class="card-header bg-success text-center" style="color:white;">
          {{ $accesorio -> TipoAccesorio }}
          {{$accesorio -> SecuencialAccesorio}}
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <h6>CODIGO:</h6>
            <h8>{{ $accesorio -> CodigoAccesorio }}</h8>
          </li>
          <li class="list-group-item">
            <h6>DEPARTAMENTO:</h6>
            <h8>{{ $accesorio -> NombreDepartamento }}</h8>
          </li>
          <li class="list-group-item">
            <h6>DIRECCION:</h6>
            <h8>{{ $accesorio -> Direccion }}</h8>
          </li>
          <li class="list-group-item">
            <h6>MARCA:</h6>
            <h8>{{ $accesorio -> Marca }}</h8>
          </li>
          <li class="list-group-item">
            <h6>MODELO:</h6>
            @if($accesorio -> Modelo == '')
            <h8>SM</h8>
            @else
            <h8>{{ $accesorio -> Modelo }}</h8>
            @endif
          </li>
          <li class="list-group-item">
            <h6>SERIE:</h6>
            @if($accesorio -> Serie == '')
            <h8>SN</h8>
            @else
            <h8>{{ $accesorio -> Serie }}</h8>
            @endif
          </li>
          <li class="list-group-item">
            <h6>ENTRADA/SALIDA:</h6>
            @if($accesorio -> EntradaSalida == 0)
            <h8>NO</h8>
            @else
            <h8>SI</h8>
            @endif
          </li>
          <li class="list-group-item">
            <h6>DESCRIPCION:</h6>
            @if($accesorio -> DescripcionAccesorio == '')
            <h8>NINGUNA</h8>
            @else
            <h8>{{ $accesorio -> DescripcionAccesorio }}</h8>
            @endif
          </li>
          <li class="list-group-item">
            <div class="container text-center">
                <div class="row">
                  <div class="col">
                    <button type="button" class="btn btn-outline-secondary" style="width:100%" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasRight">Observaciones</button>
                  </div>
                  <div class="col">
                    <button type="button" class="btn btn-outline-success" style="width:100%" data-bs-toggle="modal" data-bs-target="#editForm{{ $loop->iteration }}">Editar</button>
                  </div>
                </div>
            </div>
            
          </li>
        </ul>
        
      </div>
      
    </div>
    <div class="modal fade modal" id="editForm{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalEdit" aria-hidden="true">
            @livewire('editar-accesorios', ['sec' => $accesorio -> SecuencialAccesorio])
  </div>
    @endforeach
  </div>
  
 
  
  <!-- Modal Agregar-->
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
                  <option value="{{$accesorio->Secuencial}}">{{$accesorio->Nombre}} </option>
                  @endforeach

                </select>
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

              <input type="hidden" name="inputNombreEquipo" value="{{ $accesorios[0]->NombreEquipo }}">
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>


            </form>

          </div>

        </div>
      </div>
    </div>
  </div>

</div>