<link rel="stylesheet" href="http://localhost/inventariohgpt/resources/css/detalle.css">

<div class="modal-dialog modal-dialog-centered border-success mb-3">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Responsable</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                    <div class="detallesR">
                        <h6 class="card-title">CÉDULA:</h6>
                        <p class="card-text">{{ $responsable[0] -> Cedula }}</p>
                    </div>
                    <div class="detallesR">
                        <h6 class="card-title">NOMBRES:</h6>
                        <p class="card-text">{{ $responsable[0] -> Nombres }}</p>
                    </div>
                    <div class="detallesR">
                        <h6 class="card-title">APELLIDOS:</h6>
                        <p class="card-text">{{ $responsable[0] -> Apellidos }}</p>
                    </div>
                    <div class="detallesR">
                        <h6 class="card-title">DEPARTAMENTO:</h6>
                        <p class="card-text">{{ $responsable[0] -> NombreDepartamento }}</p>
                    </div>
                    <div class="detallesR">
                        <h6 class="card-title">F.DE NACIMIENTO:</h6>
                        <p class="card-text">{{ $responsable[0] -> FechaNacimiento }}</p>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
