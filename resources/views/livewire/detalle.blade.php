<div class="container">
  <div class="modal-dialog modal-dialog-centered border-success mb-3">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Responsable</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="detallesR">
          <div class="row mb-1">
            <div class="col">
                <h6 class="card-title">CÉDULA:</h6>
            </div>
            <div class="col">
                <p class="card-text">{{ $responsable -> Cedula }}</p>
            </div>
          </div>
        </div>
        <div class="detallesR">
          <div class="row mb-1">
            <div class="col">
                <h6 class="card-title">NOMBRES:</h6>
            </div>
            <div class="col">
                <p class="card-text">{{ $responsable -> Nombres }}</p>
            </div>
          </div>
        </div>
        <div class="detallesR">
          <div class="row mb-1">
            <div class="col">
                <h6 class="card-title">APELLIDOS:</h6>
            </div>
            <div class="col">
                <p class="card-text">{{ $responsable -> Apellidos }}</p>
            </div>
          </div>
        </div>
        <div class="detallesR">
          <div class="row mb-1">
            <div class="col">
                <h6 class="card-title">DEPARTAMENTO:</h6>
            </div>
            <div class="col">
                <p class="card-text">{{ $responsable -> NombreDepartamento }}</p>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</div>