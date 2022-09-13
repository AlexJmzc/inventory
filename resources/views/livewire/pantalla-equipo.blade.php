
<link rel="stylesheet" href="http://localhost/inventariohgpt/resources/css/pantalla-equipo.css">

<div class="dprincipal">
    <div class="nombreEquipo">
        <h3><span class="badge bg-secondary">{{$equipo[0] -> Nombre}}</span></h3>
    </div>
    <div class="datos">
        <div class="responsable">
            <div class="card border-success mb-3" style="width: 15rem;">
                <img src="http://localhost/inventariohgpt/resources/imagenes/p1.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $equipo[0] -> NombreCompleto }}</h5>
                    <p class="card-text">{{ $equipo[0] -> NombreDepartamento }}</p>
                    <a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Ver más</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="dequipo">
            <div class="card text-center border-success mb-3">
                <div class="card-header bg-success">
                    Datos generales del equipo

                </div>
                <div class="card-body">
                    <div class="detalles">
                        <h6 class="card-title">UBICACIÓN:</h6>
                        <p class="card-text">{{ $equipo[0] -> Direccion }}</p>
                    </div>
                    <div class="detalles">
                        <h6 class="card-title">TIPO:</h6>
                        <p class="card-text">{{ $equipo[0] -> Tipo }}</p>
                    </div>
                    <div class="detalles">
                        <h6 class="card-title">MARCA:</h6>
                        <p class="card-text">{{ $equipo[0] -> Marca }}</p>
                    </div>
                    <div class="detalles">
                        <h6 class="card-title">O.S:</h6>
                        <p class="card-text">{{ $equipo[0] -> SO }} {{ $equipo[0] -> Version }}</p>
                    </div>
                    <div class="detalles">
                        <h6 class="card-title">BITS:</h6>
                        <p class="card-text">{{ $equipo[0] -> Bits }}</p>
                    </div>
                </div>
            </div>
            <div class="card text-center border-success mb-3">
                <div class="card-header bg-success">
                    Network
                </div>
                <div class="card-body">
                    <div class="detalles">
                        <h6 class="card-title">DIRECCIÓN IP:</h6>
                        <p class="card-text">{{ $equipo[0] -> DireccionIP }}</p>
                    </div>
                    <div class="detalles">
                        <h6 class="card-title">DIRECCIÓN MAC:</h6>
                        <p class="card-text">{{ $equipo[0] -> DireccionMAC }}</p>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <livewire:detalle></livewire:detalle>
    </div>
</div>