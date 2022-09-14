<!--<div style="display:flex; flex-direction:column;">
    <h1>{{ $network[0] -> Nombre }}</h1>
    <h1>{{ $network[0] -> Dominio }}</h1>
    <h1>{{ $network[0] -> Conectividad }}</h1>
    <h1>{{ $network[0] -> DireccionIP }}</h1>
    <h1>{{ $network[0] -> DireccionMAC }}</h1>
    <h1>{{ $network[0] -> ConectividadImpresora }}</h1>
    <h1>{{ $network[0] -> Marca }}</h1>
    <h1>{{ $network[0] -> IPImpresora }}</h1>
</div>-->

<div class="container-fluid text-center">
    <div class="row">
        <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        RED
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">DOMINIO: {{ $network[0] -> Dominio }}</li>
                        <li class="list-group-item">CONECTIVIDAD: {{ $network[0] -> Conectividad }}</li>
                        <li class="list-group-item">DIRECCION IP: {{ $network[0] -> DireccionIP }}</li>
                        <li class="list-group-item">DIRECCION MAC: {{ $network[0] -> DireccionMAC }}</li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        IMPRESORA
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">CONECTIVIDAD: {{ $network[0] -> ConectividadImpresora }}</li>
                        <li class="list-group-item">MARCA: {{ $network[0] -> Marca }}</li>
                        <li class="list-group-item">DIRECCION IP: {{ $network[0] -> IPImpresora }}</li>
                    </ul>
                </div>
            </div>
    </div>
</div>