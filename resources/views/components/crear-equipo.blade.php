@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="http://localhost/inventory/resources/js/form-dinamico.js"></script>
<!-- <link rel="stylesheet" href="http://localhost/inventory/resources/css/form-dinamico.css"> -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


@section('content')
<div class="container border border-success rounded mb-3">
    <h1 class="mb-3">Registro de Equipos</h1>
    <div class="progress mb-3" style="height: 20px;">
        <div class="progress-bar progress-bar-striped active bg-success progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <form id="regiration_form" novalidate method="POST" action="{{ route('equipos.store') }}" role="form" enctype="multipart/form-data">
        @csrf

        <fieldset>
            <h2 class="mb-3">Paso 1: Responsable</h2>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="cedulaResponsable" name="cedulaResponsable" placeholder="Cédula">
                <label for="cedulaResponsable">Cédula del responsable</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="codigoEquipo" name="codigoEquipo" placeholder="Código">
                <label for="codigoEquipo" class="form-label">Código del equipo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombreEquipo" name="nombreEquipo" placeholder="Nombre del equipo">
                <label for="nombreEquipo" class="form-label">Nombre del equipo</label>
            </div>


            <input type="button" name="next" class="next btn btn-danger" value="Siguiente" />
        </fieldset>

        <fieldset>
            <h2 class="mb-3"> Paso 2: Características del equipo</h2>
            <div class="form-floating mb-3">
                <select name="inputTipoEquipo" id="inputTipoEquipo" class="form-select">
                    <option value="">Elegir</option>
                    <option value="2"> Portátil </option>
                    <option value="1"> Escritorio </option>
                </select>
                <label for="" class="form-label">Tipo de Equipo</label>

            </div>
            <div class="form-floating mb-3">
                <select name="inputMarcaEquipo" id="inputMarcaEquipo" class="form-select">
                    <option selected value="">Elegir</option>
                    @foreach ($marcas as $marca)
                    <option value="{{ $marca->Secuencial }}"> {{ $marca ->Nombre }} </option>
                    @endforeach
                </select>
                <label for="inputMarcaEquipo" class="form-label">Marca</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="modeloEquipo" id="modeloEquipo" placeholder="modeloEquipo">
                <label for="modeloEquipo">Modelo</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="serieEquipo" id="serieEquipo" placeholder="serieEquipo">
                <label for="serieEquipo">Serie</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="inputDescripcion" rows="2"></textarea>
                <label for="inputDescripcion" class="form-label">Descripción</label>

            </div>

            <input type="button" name="previous" class="previous btn btn-light" value="Previo" />
            <input type="button" name="next" class="next btn btn-danger" value="Siguiente" />
        </fieldset>

        <fieldset>
            <h2 class="mb-3">Paso 3: Recursos</h2>
            <div class="form-floating mb-3">

                <select name="inputProcesador" id="inputProcesador" class="form-select">
                    <option selected value="">Elegir</option>
                    @foreach ($procesadores as $procesador)
                    <option value="{{ $procesador->Secuencial }}"> {{ $procesador->Nombre}} </option>
                    @endforeach
                </select>
                <label for="inputProcesador" class="form-label">Procesador</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="memoriaRAM" placeholder="RAM"></input>
                <label for="memoriaRAM">Memoria RAM</label>
            </div>

            <div class="row g-2">
                <div class="col-md-10">
                    <div class="form-floating mb-3">
                        <select name="inputMarcaDisco" id="inputMarcaDisco" class="form-select">
                            <option selected value="">Elegir</option>
                            @foreach ($marcas as $marca)
                            <option value="{{ $marca->Secuencial }}"> {{ $marca ->Nombre }} </option>
                            @endforeach
                        </select>
                        <label for="inputMarcaDisco" class="form-label">Marca del Disco</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" name="capacidadDisco" placeholder="RAM"></input>
                        <label for="capacidadDisco">Capacidad Disco</label>
                    </div>
                </div>

                <div class="col-md-2 align-self-center">
                    <div class="row justify-content-center">
                        <button id="addRow" type="button" class="btn btn-success" style="width: 50%;">Agregar</button>
                    </div>
                </div>

            </div>

            <div class="row g-2" id="nuevafila" style="display:none;">
                <div class="col-md-10">
                    <div class="form-floating mb-3">
                        <select id="inputMarcaDisco2" class="form-select">
                            <option selected value="">Elegir</option>
                            @foreach ($marcas as $marca)
                            <option value="{{ $marca ->Secuencial }}">{{ $marca ->Nombre }} </option>
                            @endforeach
                        </select>
                        <label for="inputMarcaDisco" class="form-label">Marca del Disco</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="capacidadDisco2" placeholder="RAM"></input>
                        <label for="discos">Capacidad Disco</label>
                    </div>
                </div>
                <div class="col-md-2 align-self-center">
                    <div class="row justify-content-center">
                        <button id="removeRow" type="button" class="btn btn-danger" style="width: 50%;">Borrar</button>
                    </div>
                </div>
            </div>




            <input type="button" name="previous" class="previous btn btn-light" value="Previo" />
            <input type="button" name="next" class="next btn btn-danger" value="Siguiente" />
        </fieldset>

        <fieldset>
            <h2 class="mb-3">Paso 4: Accesorios</h2>

            <p class="h3">Mouse
                <input type="hidden" value="2" name="inputMouse">
            </p>

            <div class="row g-2">
                <div class="col-md-4 form-floating mb-3">
                    <input class="form-control" name="codigoMouse" placeholder="Mouse"></input>
                    <label for="mouse">Código</label>
                </div>

                <div class="col-md-4 form-floating mb-3">
                    <select name="inputMarcaMouse" id="inputMarcaMouse" class="form-select">
                        <option selected value="">Elegir</option>
                        @foreach ($marcas as $marca)
                        <option value="{{ $marca->Secuencial }}"> {{ $marca ->Nombre }} </option>
                        @endforeach
                    </select>
                    <label for="inputMarcaMouse" class="form-label">Marca</label>
                </div>

                <div class="col-md-4 form-floating mb-3">
                    <input class="form-control" name="serieMouse" placeholder="Mouse"></input>
                    <label for="mouse">Serie</label>
                </div>

                <!--<div class="col-md-3 form-floating mb-3">
                    <select name="conectorMouse" id="conectorMouse" class="form-select">
                        <option selected value="">Elegir</option>
                        <option value="PS/2"> PS/2 </option>
                        <option value="USB"> USB </option>
                    </select>
                    <label for="conectorMouse" class="form-label">Tipo de conector</label>
                </div>-->

                <div class="col-md-12 form-floating mb-3">
                    <textarea class="form-control" name="inputDescripcionMouse" rows="2"></textarea>
                    <label for="inputDescripcionMouse" class="form-label">Descripción</label>
                </div>

            </div>

            <p class="h3">Teclado
                <input type="hidden" value="4" name="inputTeclado">
            </p>

            <div class="row g-2">
                <div class="col-md-4 form-floating mb-3">
                    <input class="form-control" name="codigoTeclado" placeholder="Teclado"></input>
                    <label for="Teclado">Código</label>
                </div>

                <div class="col-md-4 form-floating mb-3">
                    <select name="inputMarcaTeclado" id="inputMarcaTeclado" class="form-select">
                        <option selected value="">Elegir</option>
                        @foreach ($marcas as $marca)
                        <option value="{{ $marca->Secuencial }}"> {{ $marca ->Nombre }} </option>
                        @endforeach
                    </select>
                    <label for="inputMarcaTeclado" class="form-label">Marca</label>
                </div>

                <div class="col-md-4 form-floating mb-3">
                    <input class="form-control" name="serieTeclado" placeholder="Teclado"></input>
                    <label for="Teclado">Serie</label>
                </div>

                <!--<div class="col-md-3 form-floating mb-3">
                    <select name="conectorTeclado" id="conectorTeclado" class="form-select">
                        <option selected value="">Elegir</option>
                        <option value="PS/2"> PS/2 </option>
                        <option value="USB"> USB </option>
                    </select>
                    <label for="conectorTeclado" class="form-label">Tipo de conector</label>
                </div>-->

                <div class="col-md-12 form-floating mb-3">
                    <textarea class="form-control" name="inputDescripcionTeclado" rows="2"></textarea>
                    <label for="inputDescripcionTeclado" class="form-label">Descripción</label>
                </div>
            </div>

            <p class="h3">Monitor
                <input type="hidden" value="1" name="inputMonitor">
            </p>

            <div class="row g-2">
                <div class="col-md form-floating mb-3">
                    <input class="form-control" name="codigoMonitor" placeholder="Monitor"></input>
                    <label for="Monitor">Código</label>
                </div>

                <div class="col-md form-floating mb-3">
                    <select name="inputMarcaMonitor" id="inputMarcaMonitor" class="form-select">
                        <option selected value="">Elegir</option>
                        @foreach ($marcas as $marca)
                        <option value="{{ $marca->Secuencial }}"> {{ $marca ->Nombre }} </option>
                        @endforeach
                    </select>
                    <label for="inputMarcaMonitor" class="form-label">Marca</label>
                </div>

                <div class="col-md form-floating mb-3">
                    <input class="form-control" name="modeloMonitor" placeholder="Monitor"></input>
                    <label for="Monitor">Modelo</label>
                </div>

                <div class="col-md form-floating mb-3">
                    <input class="form-control" name="serieMonitor" placeholder="Monitor"></input>
                    <label for="Monitor">Serie</label>

                </div>

                <div class="col-md-12 form-floating mb-3">
                    <textarea class="form-control" name="inputDescripcionMonitor" rows="2"></textarea>
                    <label for="inputDescripcionMonitor" class="form-label">Descripción</label>
                </div>

            </div>

            <div class="mb-3">
                <button class="btn btn-success mb-3" type="button" id="show">Añadir Parlantes</button>
            </div>

            <div id="rowParlantes" style="display:none;">
                <p class="h3">Parlantes
                    <input type="hidden" value="3" name="inputParlantes">
                </p>

                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        <input class="form-control" name="codigoParlantes" placeholder="Parlantes"></input>
                        <label for="Parlantes">Código</label>
                    </div>

                    <div class="col-md form-floating mb-3">
                        <select name="inputMarcaParlantes" id="inputMarcaParlantes" class="form-select">
                            <option selected value="">Elegir</option>
                            @foreach ($marcas as $marca)
                            <option value="{{ $marca->Secuencial }}"> {{ $marca ->Nombre }} </option>
                            @endforeach
                        </select>
                        <label for="inputMarcaParlantes" class="form-label">Marca</label>
                    </div>

                    <div class="col-md form-floating mb-3">
                        <input class="form-control" name="serieParlantes" placeholder="Parlantes"></input>
                        <label for="Parlantes">Serie</label>
                    </div>
                    <div class="col-md-12 form-floating mb-3">
                        <textarea class="form-control" name="inputDescripcionParlante" rows="2"></textarea>
                        <label for="inputDescripcionParlante" class="form-label">Descripción</label>
                    </div>

                </div>
                <button class="btn btn-danger mb-3" type="button" id="hide">Cancelar</button>
            </div>


            <input type="button" name="previous" class="previous btn btn-light" value="Previo" />
            <input type="button" name="next" class="next btn btn-danger" value="Siguiente" />

        </fieldset>

        <fieldset>
            <h2 class="mb-3">Paso 5: Programas</h2>

            <div class="list-group mb-3">
                <p class="h4 mt-3 mb-3 m-auto">Sistema Operativo</p>
                <label class="list-group-item d-flex justify-content-evenly">
                    &nbsp
                    <strong class="m-auto" style="width: 4cm;"> Programa </strong>
                    &nbsp
                    <strong class="m-auto">Bits</strong>
                    &nbsp
                    <strong class="m-auto"> Licenciado </strong>
                    &nbsp
                    <strong class="m-auto"> Activado</strong>
                    &nbsp
                </label>
                @foreach ($programas as $programa)
                @if ($programa->Descripcion == "SISTEMA OPERATIVO")
                <label class="list-group-item d-flex justify-content-evenly" id="itemSO[]">
                    <div style="width: 4cm;">
                        <input name="listaProgramas[]" class="form-check-input me-1" type="radio" value="{{ $programa->Secuencial}}">
                        {{ $programa->Nombre}} {{$programa->Version}}
                    </div>
                    &nbsp
                    <div>
                        <input name="itemPrograma[]" class="form-check-input me-1" type="radio" value="1">
                        32
                        &nbsp
                        <input name="itemPrograma[]" class="form-check-input me-1" type="radio" value="2">
                        64
                    </div>
                    &nbsp
                    <div>
                        <input name="itemPrograma[]" class="form-check-input me-1" type="checkbox" value="1">

                    </div>
                    &nbsp
                    <div>
                        <input id="itemPrograma[]" name="itemPrograma[]" class="form-check-input me-1" type="checkbox" value="1">
                    </div>
                    &nbsp
                </label>

                @endif
                @endforeach



                <p class="h4 mt-3 mb-3 m-auto">Ofimatica</p>
                <label class="list-group-item d-flex justify-content-evenly">
                    &nbsp
                    <strong class="m-auto" style="width: 4cm;"> Programa </strong>
                    &nbsp
                    <strong class="m-auto"> Licenciado </strong>
                    &nbsp
                    <strong class="m-auto"> Activado</strong>
                    &nbsp
                </label>
                @foreach ($programas as $programa)
                @if ($programa->Descripcion == "OFIMATICA")
                <label class="list-group-item d-flex justify-content-evenly" >
                    <div style="width: 4cm;" class="m-auto">
                        <input name="listaProgramasOfimatica[]" class="form-check-input me-1" type="radio" value="{{ $programa->Secuencial}}">
                        {{ $programa->Nombre}} {{$programa->Version}}
                    </div>
                    &nbsp
                    <div class="m-auto">
                        <input name="itemPrograma[]" class="form-check-input me-1" type="checkbox" value="1">

                    </div>
                    &nbsp
                    <div class="m-auto">
                        <input name="itemPrograma[]" class="form-check-input me-1" type="checkbox" value="1">
                    </div>
                    &nbsp
                </label>
                @endif
                @endforeach

                <p class="h4 mt-3 mb-3 m-auto">Otros</p>
                <label class="list-group-item d-flex justify-content-evenly">
                    &nbsp
                    <strong class="m-auto" style="width: 4cm;"> Programa </strong>
                    &nbsp

                    <strong class="m-auto"> Licenciado </strong>
                    &nbsp
                    <strong class="m-auto"> Activado</strong>
                    &nbsp
                </label>

                @foreach ($programas as $programa)
                @if ($programa->Descripcion == NULL)
                <label class="list-group-item d-flex justify-content-evenly">
                    <div style="width: 4cm;" class="m-auto">
                        <input name="listaProgramas[]" class="form-check-input" type="checkbox" value="{{ $programa->Secuencial}}">
                        {{ $programa->Nombre}}
                    </div>
                    &nbsp
                    <div class="m-auto">
                        <input name="itemPrograma[]" class="form-check-input me-1" type="checkbox" value="1">

                    </div>
                    &nbsp
                    <div class="m-auto">
                        <input name="itemPrograma[]" class="form-check-input me-1" type="checkbox" value="1">
                    </div>
                    &nbsp

                </label>
                @endif
                @endforeach
            </div>
           

            <input type="button" name="previous" class="previous btn btn-light" value="Previo" />
            <input type="button" name="next" class="next btn btn-danger" value="Siguiente" />

        </fieldset>

        <fieldset>
            <h2 class="mb-3">Paso 6: Conectividad</h2>
            <div class="form-floating mb-3">
                <input class="form-control" name="direccionIP" placeholder="IP"></input>
                <label for="direccionIP">Dirección IP</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" name="direccionMAC" placeholder="MAC"></input>
                <label for="direccionMAC">Dirección MAC</label>
            </div>
            <div class="row g-2">
                <div class="col-md form-floating mb-3">
                    <select name="inputDominio" id="inputDominio" class="form-select">
                        <option selected value="">Elegir</option>
                        <option value="lan.tungurahua.gob.ec"> lan.tungurahua.gob.ec </option>
                        <option value="BIBLIOTECA"> BIBLIOTECA </option>
                        <option value="WORKGROUP"> WORKGROUP </option>
                    </select>
                    <label for="inputDominio" class="form-label">Dominio</label>
                </div>

                <div class="col-md form-floating mb-3">
                    <select name="inputConectividad" id="inputConectividad" class="form-select">
                        <option selected value="">Elegir</option>
                        <option value="1"> Si </option>
                        <option value="0"> No </option>
                    </select>
                    <label for="inputConectividad" class="form-label">Posee Conectividad</label>
                </div>
            </div>
            <div class="row g-2">

                <div class="col-md form-floating mb-3">
                    <input class="form-control" name="ipImpresora" placeholder="Impresora"></input>
                    <label for="ipImpresora">Dirección IP de la impresora</label>
                </div>

                <div class="col-md form-floating mb-3">
                    <select name="inputMarcaImpresora" id="inputMarcaImpresora" class="form-select">
                        <option selected value="">Elegir</option>
                        @foreach ($marcas as $marca)
                        <option value="{{ $marca->Secuencial }}"> {{ $marca ->Nombre }} </option>
                        @endforeach
                    </select>
                    <label for="inputMarcaImpresora" class="form-label">Marca Impresora</label>
                </div>

                <div class="col-md form-floating mb-3">
                    <select name="inputConectividadImpresora" id="inputConectividadImpresora" class="form-select">
                        <option selected value="">Elegir</option>
                        <option value="1"> Si </option>
                        <option value="0"> No </option>
                    </select>
                    <label for="inputConectividadImpresora" class="form-label">Posee Conectividad</label>
                </div>
            </div>

            <input type="button" name="previous" class="previous btn btn-light" value="Previo" />
            <input type="submit" name="submit" class="submit btn btn-success" value="Enviar" id="submit_data" />

        </fieldset>

    </form>
</div>

@endsection

<script>
    $(document).ready(function() {
        $('#newPrograma').click(function() {
            var content = $('#programasEleccion').val();
            var fixingContent =
                '<li id="newItem" class="list-group-item d-flex justify-content-between align-items-center">' +
                '<div class="fw-bold m-auto">' + content + '</div>' +
                '<button id="eliminarItem" type="button" class="btn btn-danger">' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">' +
                '<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />' +
                '</svg>' +
                '</button>' +
                '</li>';

            $('#listaProgramas').append(fixingContent);
        })
    });
</script>