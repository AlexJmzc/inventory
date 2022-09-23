<div class="container text-center">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel">{{$observaciones[0] -> Nombre}} con código {{$observaciones[0] -> Codigo}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @foreach($observaciones as $observacion)
            <div class="detallesR">
                <p class="card-text">{{ $observacion -> Descripcion }}</p>
            </div>
        @endforeach
    </div>
</div>



