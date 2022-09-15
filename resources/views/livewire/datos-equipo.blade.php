<div class="container text-center">
    <div class="row">
        <div class="col  mb-5 mt-5">
            <h3><span class="badge bg-secondary">{{$equipo[0] -> NombreEquipo}}</span></h3>
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
                        <h8>{{ $equipo[0] -> CedulaResponsable }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>NOMBRES:</h6>
                        <h8>{{ $equipo[0] -> Nombres }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>APELLIDOS:</h6>
                        <h8>{{ $equipo[0] -> Apellidos }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>CODIGO DE DEPARTAMENTO:</h6>
                        <h8>{{ $equipo[0] -> CodigoDepartamento }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>DEPARTAMENTO:</h6>
                        <h8>{{ $equipo[0] -> NombreDepartamento }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>DIRECCION:</h6>
                        <h8>{{ $equipo[0] -> Direccion }}</h8>
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
                        <h8>{{ $equipo[0] -> CodigoEquipo }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>TIPO:</h6>
                        <h8>{{ $equipo[0] -> TipoEquipo }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>MARCA:</h6>
                        <h8>{{ $equipo[0] -> MarcaEquipo }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>MODELO:</h6>
                        @if($equipo[0] -> ModeloEquipo == '')
                            <h8>SM</h8>
                        @else
                            <h8>{{ $equipo[0] -> ModeloEquipo }}</h8>
                        @endif
                    </li>
                    <li class="list-group-item">
                        <h6>SERIE:</h6>
                        @if($equipo[0] -> SerieEquipo == '')
                            <h8>SN</h8>
                        @else
                            <h8>{{ $equipo[0] -> SerieEquipo }}</h8>
                        @endif
                    </li>
                    <li class="list-group-item">
                        <h6>OBSERVACION:</h6>
                        @if($equipo[0] -> Observacion == '')
                            <h8>NINGUNA</h8>
                        @else
                            <h8>{{ $equipo[0] -> Observacion }}</h8>
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
                        <h8>{{ $equipo[0] -> Procesador }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>VELOCIDAD:</h6>
                        <h8>{{ $equipo[0] -> Velocidad }} GHz</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>MEMORIA:</h6>
                        <h8>{{ $equipo[0] ->  Memoria}} GB</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>DISCO:</h6>
                        <h8>{{ $equipo[0] -> CapacidadDisco1 }} TB</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>MARCA:</h6>
                        <h8>{{ $equipo[0] -> MarcaDisco1 }}</h8>
                    </li>
                    @if($equipo[0] -> CapacidadDisco2 == NULL)

                    @else
                        <li class="list-group-item">
                            <h6>DISCO:</h6>
                            <h8>{{ $equipo[0] -> CapacidadDisco2 }} TB</h8>
                        </li>
                        <li class="list-group-item">
                            <h6>MARCA:</h6>
                            <h8>{{ $equipo[0] -> MarcaDisco2 }}</h8>
                        </li>
                    @endif
                </ul>             
            </div>
        </div>
    </div>
</div>