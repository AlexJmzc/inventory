
<div class="container text-center">
    <div class="row">
        <div class="col  mb-5 mt-5">
            <h3><span class="badge bg-secondary">{{$equipo[0] -> Nombre}}</span></h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
                <div class="card border-success mb-5">
                    <img src="http://localhost/inventory/resources/imagenes/p1.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $equipo[0] -> NombreCompleto }}</h5>
                        <p class="card-text">{{ $equipo[0] -> NombreDepartamento }}</p>
                        <a>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Ver más</button>
                        </a>
                    </div>
                </div>
        </div>
        <div class="col">
            <div class="card border-success mb-3">
                <div class="card-header bg-success text-center"  style="color:white;">
                    Datos generales del equipo
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h6>DIRECCION:</h6>
                        <h8>{{ $equipo[0] -> Direccion }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>TIPO:</h6>
                        <h8>{{ $equipo[0] -> Tipo }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>MARCA:</h6>
                        <h8>{{ $equipo[0] -> Marca }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>SISTEMA OPERATIVO:</h6>
                        <h8>{{ $equipo[0] -> SO }} {{ $equipo[0] -> Version }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>BITS:</h6>
                        <h8>{{ $equipo[0] -> Bits }}</h8>
                    </li>
                </ul>             
            </div>
        </div>
        <div class="col">
            <div class="card text-center border-success mb-3">
                <div class="card-header bg-success" style="color:white;">
                    Network
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h6>DIRECCION IP:</h6>
                        <h8>{{ $equipo[0] -> DireccionIP }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>DIRECCION MAC:</h6>
                        <h8>{{ $equipo[0] -> DireccionMAC }}</h8>
                    </li>
                </ul>  
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <livewire:detalle aux='{{ $equipo[0] -> Cedula }}'></livewire:detalle>
</div>


    