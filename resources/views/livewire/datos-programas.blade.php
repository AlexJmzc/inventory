<div class="container text-center">
    <div class="row">
        <div class="col  mb-5 mt-5">
            <h3><span class="badge bg-secondary">{{$programas[0] -> NombreEquipo}}</span></h3>
        </div>
    </div>
    <div class="row">
        @foreach($programas as  $programa)
        <div class="col">
            <div class="card border-success mb-3">
                <div class="card-header bg-success text-center"  style="color:white;">
                    {{ $programa -> Programa }}
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h6>VERSION:</h6>
                        <h8>{{ $programa -> Version }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>BITS:</h6>
                        <h8>{{ $programa -> Bits }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>LICENCIA:</h6>
                        @if($programa -> Licencia == 1)
                            <h8>SI</h8>
                        @else
                            <h8>NO</h8>
                        @endif
                    </li>
                    <li class="list-group-item">
                        <h6>ACTIVO:</h6>
                        @if($programa -> Activo == 1)
                            <h8>SI</h8>
                        @else
                            <h8>NO</h8>
                        @endif     
                    </li>
                </ul>             
            </div>
        </div>
        @endforeach
    </div>
</div>