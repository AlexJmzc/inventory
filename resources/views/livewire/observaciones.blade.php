<div class="container text-center">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel">{{$datos -> Nombre}} con código {{$datos -> Codigo}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    @if($observaciones == null)
        <div class="offcanvas-body">
            <div class="detallesR">
                <p class="card-text">NINGUNA</p>
            </div>
        </div>
    @else
        <div class="offcanvas-body">
            @foreach($observaciones as $observacion)
                <div class="detallesR">
                    <p class="card-text">{{ $observacion -> Descripcion }}</p>
                </div>
            @endforeach
        </div>
    @endif
    
</div>



