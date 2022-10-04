<!-- Pantalla con los datos de los programas del equipo -->
<div class="container text-center">
    <div class="d-flex mb-4">
        <!-- Titulo -->
        <div class="p-2 flex-grow-1">
            <h3><span class="badge bg-secondary">{{$equipo -> Nombre}}</span></h3>
        </div>

        <!-- Boton para agregar programas -->
        <div class="p-2">
            <button type="button" class="btn btn-outline-success position-absolute top-3 end-0 me-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
                Añadir
            </button>
        </div>
    </div>


<!-- Control para cuando no existen programas -->
@if($programas == null)
<p class="h3"> No existen programas </p>
@else
    <div class="row">
        @foreach($programas as $programa)
        <!-- Card con los datos de cada programa -->
        <div class="col">
            <div class="card border-success mb-3">
                <div class="card-header bg-success text-center" style="color:white;">
                    {{ $programa -> Programa }}
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h6>VERSION:</h6>
                        <h8>{{ $programa -> Version }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>BITS:</h6>
                        <h8>{{ $programa -> Bits }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>LICENCIA:</h6>
                        @if($programa -> Licencia == 1)
                        <h8>SI</h8>
                        @else
                        <h8>NO</h8>
                        @endif
                    </li>
                    <li class="list-group-item">
                        <h6>ACTIVO:</h6>
                        @if($programa -> Activo == 1)
                        <h8>SI</h8>
                        @else
                        <h8>NO</h8>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
@endif
    
    <!-- Modal para agregar programas -->
    <div>
        <div class="modal fade modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Programa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="g-3" method="POST" action="{{ route('software.store')}}">
                            @csrf
                            <div class="list-group mb-3 d-flex justify-content-between">
                                <label class="list-group-item d-flex justify-content-between">
                                    &nbsp
                                    <strong class="m-auto" style="width: 4cm;"> Programa </strong>
                                    &nbsp
                                    <strong class="m-auto">Bits</strong>
                                    &nbsp
                                </label>
                                @foreach ($listaProgramas as $programa)
                                <label class="list-group-item d-flex justify-content-between">
                                    <div>
                                    <input name="listaProgramasNuevo[]" class="form-check-input me-1" type="checkbox" value="{{ $programa->Secuencial}}">
                                    {{ $programa->Nombre}} {{$programa->Version}}
                                    </div>
                                    <div class="">
                                        <input name="itemBitsP[]{{$loop->iteration}}" class="form-check-input me-1" type="radio" value="1">
                                        32
                                        &nbsp
                                        <input name="itemBitsP[]{{$loop->iteration}}" class="form-check-input me-1" type="radio" value="2" default="0">
                                        64
                                    </div>
                                </label>
                                @endforeach
                            </div>

                            <input type="hidden" name="inputNombreEquipoProgramas" value="{{ $equipo -> Nombre }}">

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