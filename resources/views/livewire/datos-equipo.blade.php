<div class="container text-center">
    <div class="row">
        <div class="col  mb-5 mt-5">
            <h3><span class="badge bg-secondary">{{$equipo -> NombreEquipo}}</span></h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card border-success mb-3">
                <div class="card-header bg-success text-center"  style="color:white;">
                    HGPT
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h6>CEDULA:</h6>
                        <h8>{{ $equipo -> CedulaResponsable }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>NOMBRES:</h6>
                        <h8>{{ $equipo -> Nombres }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>APELLIDOS:</h6>
                        <h8>{{ $equipo -> Apellidos }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>CODIGO DE DEPARTAMENTO:</h6>
                        <h8>{{ $equipo -> CodigoDepartamento }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>DEPARTAMENTO:</h6>
                        <h8>{{ $equipo -> NombreDepartamento }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>DIRECCION:</h6>
                        <h8>{{ $equipo -> Direccion }}</h8>
                    </li>
                </ul>             
            </div>
        </div>
        <div class="col">
            <div class="card border-success mb-3">
                <div class="card-header bg-success text-center"  style="color:white;">
                    DESCRIPCION
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h6>CODIGO:</h6>
                        <h8>{{ $equipo -> CodigoEquipo }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>TIPO:</h6>
                        <h8>{{ $equipo -> TipoEquipo }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>MARCA:</h6>
                        <h8>{{ $equipo -> MarcaEquipo }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>MODELO:</h6>
                        @if($equipo -> ModeloEquipo == '')
                            <h8>SM</h8>
                        @else
                            <h8>{{ $equipo -> ModeloEquipo }}</h8>
                        @endif
                    </li>
                    <li class="list-group-item">
                        <h6>SERIE:</h6>
                        @if($equipo -> SerieEquipo == '')
                            <h8>SN</h8>
                        @else
                            <h8>{{ $equipo -> SerieEquipo }}</h8>
                        @endif
                    </li>
                    <li class="list-group-item">
                        <h6>OBSERVACION:</h6>
                        @if($equipo -> Observacion == '')
                            <h8>NINGUNA</h8>
                        @else
                            <h8>{{ $equipo -> Observacion }}</h8>
                        @endif
                    </li>
                </ul>             
            </div>
        </div>
        <div class="col">
            <div class="card border-success mb-3">
                <div class="card-header bg-success text-center"  style="color:white;">
                    RECURSOS
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h6>PROCESADOR:</h6>
                        <h8>{{ $equipo -> Procesador }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>VELOCIDAD:</h6>
                        <h8>{{ $equipo -> Velocidad }} GHz</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>MEMORIA:</h6>
                        <h8>{{ $equipo ->  Memoria}} GB</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>DISCO:</h6>
                        <h8>{{ $equipo -> CapacidadDisco1 }} TB</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>MARCA:</h6>
                        <h8>{{ $equipo -> MarcaDisco1 }}</h8>
                    </li>
                    @if($equipo -> CapacidadDisco2 == NULL)

                    @else
                        <li class="list-group-item">
                            <h6>DISCO 2:</h6>
                            <h8>{{ $datosDisco2 -> CapacidadDisco2 }} TB</h8>
                        </li>
                        <li class="list-group-item">
                            <h6>MARCA:</h6>
                            <h8>{{ $datosDisco2 -> Nombre }}</h8>
                        </li>
                    @endif
                </ul>             
            </div>
        </div>
    </div>
    <div class="container text-center mt-4">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-outline-success" style="width:30%" data-bs-toggle="modal" data-bs-target="#editFormEquipo">Editar</button>
            </div>
        </div>
    </div>

    <div class="modal fade modal" id="editFormEquipo" tabindex="-1" aria-labelledby="exampleModalEdit" aria-hidden="true">
              @livewire('editar-equipo', ['nom' => $equipo -> NombreEquipo])
    </div>
</div>