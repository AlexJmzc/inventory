<div class="container text-center">
    <div class="row">
        <div class="col  mb-5 mt-5">
            <h3><span class="badge bg-secondary">{{$accesorios[0] -> NombreEquipo}}</span></h3>
        </div>
    </div>
    <div class="row">
        @foreach($accesorios as  $accesorio)
        <div class="col">
            <div class="card border-success mb-3">
                <div class="card-header bg-success text-center"  style="color:white;">
                    {{ $accesorio -> TipoAccesorio }}
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

                </ul>             
            </div>
        </div>

        @endforeach
    </div>
</div>
