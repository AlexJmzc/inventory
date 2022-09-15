<div class="modal-dialog modal-dialog-centered border-success mb-3">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Observaciones</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                {{$secuencialAccesorio}}
                @foreach($observaciones as $observacion)
                    <div class="detallesR">
                        <p class="card-text">{{ $observacion -> Descripcion }}</p>
                    </div>
                @endforeach
        </div>
    </div>
    <div class="modal-footer"></div>
</div>
