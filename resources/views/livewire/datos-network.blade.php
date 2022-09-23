<div class="container text-center">
    <div class="row">
        <div class="col  mb-5 mt-5">
            <h3><span class="badge bg-secondary">{{$network[0] -> Nombre}}</span></h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card border-success mb-3">
                <div class="card-header bg-success text-center"  style="color:white;">
                    RED
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h6>DOMINIO:</h6>
                        <h8>{{ $network[0] -> Dominio }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>CONECTIVIDAD:</h6>
                        @if($network[0] -> Conectividad == 1)
                            <h8>SI</h8>
                        @else
                            <h8>NO</h8>
                        @endif
                    </li>
                    <li class="list-group-item">
                        <h6>DIRECCION IP:</h6>
                        <h8>{{ $network[0] -> DireccionIP }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>DIRECCION MAC:</h6>
                        <h8>{{ $network[0] -> DireccionMAC }}</h8>
                    </li>
                    
                        
                   
                </ul>             
            </div>
        </div>
        <div class="col">
            <div class="card border-success mb-3">
                <div class="card-header bg-success text-center"  style="color:white;">
                    IMPRESORA
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h6>CONECTIVIDAD:</h6>
                        @if($network[0] -> ConectividadImpresora == 1)
                            <h8>SI</h8>
                        @else
                            <h8>NO</h8>
                        @endif
                    </li>
                    <li class="list-group-item">
                        <h6>MARCA:</h6>
                        <h8>{{ $network[0] -> Marca }}</h8>
                    </li>
                    <li class="list-group-item">
                        <h6>DIRECCION IP:</h6>
                        <h8>{{ $network[0] -> IPImpresora }}</h8>
                    </li>
                </ul>             
            </div>
        </div>
    </div>
    <div class="container text-center mt-4">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-outline-success" style="width:50%" data-bs-toggle="modal" data-bs-target="#editFormNetwork">Editar</button>
            </div>
        </div>
    </div>

    <div class="modal fade modal" id="editFormNetwork" tabindex="-1" aria-labelledby="exampleModalEdit" aria-hidden="true">
              @livewire('editar-network', ['nom' => $network[0] -> Nombre])
    </div>
</div>