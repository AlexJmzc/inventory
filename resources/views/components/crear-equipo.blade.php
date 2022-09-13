<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="http://localhost/inventory/resources/js/form-dinamico.js"></script>
<link rel="stylesheet" href="http://localhost/inventory/resources/css/form-dinamico.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


<div class="container border border-success rounded mb-3">
    <h1 class="mb-3">Registro de Equipos</h1>
    <div class="progress mb-3" style="height: 20px;">
        <div class="progress-bar progress-bar-striped active bg-success progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <form id="regiration_form" novalidate action="action.php" method="post">
        <fieldset>
            <h2 class="mb-3">Paso 1: Responsable</h2>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="cedula" name="data[cedula]" placeholder="Cédula">
                <label for="cedula">Cédula del responsable</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="codigo" name="data[codigo]" placeholder="Código">
                <label for="codigo" class="form-label">Código del equipo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombre" name="data[nombre]" placeholder="Nombre del equipo">
                <label for="nombre" class="form-label">Nombre del equipo</label>
            </div>


            <input type="button" name="next" class="next btn btn-danger" value="Siguiente" />
        </fieldset>

        <fieldset>
            <h2 class="mb-3"> Paso 2: Características del equipo</h2>
            <div class="form-floating mb-3">
                <select id="inputTipoEquipo" class="form-select">
                    <option selected value="">Elegir</option>
                    <option value=""> Portátil </option>
                    <option value=""> Escritorio </option>
                </select>
                <label for="inputTipoEquipo" class="form-label">Tipo de Equipo</label>

            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="data[marca]" id="marca" placeholder="HP">
                <label for="marca">Marca</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="data[modelo]" id="modelo" placeholder="modelo">
                <label for="modelo">Modelo</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="data[serie]" id="serie" placeholder="serie">
                <label for="serie">Serie</label>
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
                <select id="inputProcesador" class="form-select">
                    <option selected value="">Elegir</option>
                    <option value=""> .... </option>
                    <option value=""> ... </option>
                </select>
                <label for="inputProcesador" class="form-label">Procesador</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="data[memoria]" placeholder="RAM"></input>
                <label for="memoria">Memoria RAM</label>
            </div>

            <div class="row g-2">
                <div class="col-md-10">
                    <div class="form-floating mb-3">
                        <select id="inputMarcaDisco" class="form-select">
                            <option selected value="">Elegir</option>
                            <option value=""> .... </option>
                            <option value=""> ... </option>
                        </select>
                        <label for="inputMarcaDisco" class="form-label">Marca del Disco</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" name="data[discos]" placeholder="RAM"></input>
                        <label for="discos">Capacidad Disco</label>
                    </div>
                </div>

                <div class="col-md-2 align-self-center">
                    <div class="row justify-content-center">
                    <button id="addRow" type="button" class="btn btn-success" style="width: 50%;">Agregar</button>
                    </div>
                </div>

                <div id="newRow"></div>

            </div>

            <input type="button" name="previous" class="previous btn btn-light" value="Previo" />
            <input type="button" name="next" class="next btn btn-danger" value="Siguiente" />
        </fieldset>

        <fieldset>
            <h2 class="mb-3">Paso 4: Conectividad</h2>
            <div class="form-floating mb-3">
                <input class="form-control" name="data[direccionIP]" placeholder="IP"></input>
                <label for="direccionIP">Dirección IP</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" name="data[direccionMAC]" placeholder="MAC"></input>
                <label for="direccionMAC">Dirección MAC</label>
            </div>
            <div class="row g-2">
                <div class="col-md form-floating mb-3">
                    <select id="inputDominio" class="form-select">
                        <option selected value="">Elegir</option>
                        <option value=""> .... </option>
                        <option value=""> ... </option>
                    </select>
                    <label for="inputDominio" class="form-label">Dominio</label>
                </div>

                <div class="col-md form-floating mb-3">
                    <select id="inputConectividad" class="form-select">
                        <option selected value="">Elegir</option>
                        <option value="1"> Si </option>
                        <option value="0"> No </option>
                    </select>
                    <label for="inputConectividad" class="form-label">Posee Conectividad</label>
                </div>
            </div>
            <div class="row g-2">

                <div class="col-md form-floating mb-3">
                    <input class="form-control" name="data[ipImpresora]" placeholder="Impresora"></input>
                    <label for="ipImpresora">Dirección IP de la impresora</label>
                </div>

                <div class="col-md form-floating mb-3">
                    <select id="inputMarcaImpresora" class="form-select">
                        <option selected value="">Elegir</option>
                        <option value=""> .... </option>
                        <option value=""> ... </option>
                    </select>
                    <label for="inputMarcaImpresora" class="form-label">Marca Impresora</label>
                </div>

                <div class="col-md form-floating mb-3">
                    <select id="inputConectividadImpresora" class="form-select">
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