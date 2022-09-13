
<link rel="stylesheet" href="http://localhost/inventariohgpt/resources/css/pantalla-equipo.css">

<div class="dprincipal">
    <div class="nombreEquipo">
        <h3><span class="badge bg-secondary">NOMBRE EQUIPO</span></h3>
    </div>
    <div class="datos">
        <div class="responsable">
            <div class="card border-success mb-3" style="width: 15rem;">
                <img src="http://localhost/inventariohgpt/resources/imagenes/p1.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nombre Responsable</h5>
                    <p class="card-text">Departamento</p>
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
                        <p class="card-text">EDIFICIO CENTRAL PLANTA BAJA</p>
                    </div>
                    <div class="detalles">
                        <h6 class="card-title">TIPO:</h6>
                        <p class="card-text">ESCRITORIO</p>
                    </div>
                    <div class="detalles">
                        <h6 class="card-title">MARCA:</h6>
                        <p class="card-text">HP</p>
                    </div>
                    <div class="detalles">
                        <h6 class="card-title">O.S:</h6>
                        <p class="card-text">WINDOWS 10</p>
                    </div>
                    <div class="detalles">
                        <h6 class="card-title">BITS:</h6>
                        <p class="card-text">64</p>
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
                        <p class="card-text">172.16.20.168</p>
                    </div>
                    <div class="detalles">
                        <h6 class="card-title">DIRECCIÓN MAC:</h6>
                        <p class="card-text">B0:7B:25:02:C8:22</p>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <livewire:detalle></livewire:detalle>
    </div>
</div>