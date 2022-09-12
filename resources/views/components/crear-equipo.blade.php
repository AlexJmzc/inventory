@extends('layouts.app')


@section('content')
<div class="container">
    <form class="row g-3">
        <div class="col-md-4">
            <label for="inputTipo" class="form-label">Tipo de Equipo</label>
            <select name="inputTipo" class="form-select" required>
                <option selected disabled value="">Elige</option>
                <option value="Portatil">Portatil</option>
                <option value="Escritorio">Escritorio</option>

            </select>
        </div>
        <div class="col-md-4">
            <label for="validationServer02" class="form-label">Nombre del Equipo</label>
            <input type="text" class="form-control" id="validationServer02" required>
        </div>
        <div class="col-md-4">
            <label for="validationServerUsername" class="form-label">Código</label>            
            <input type="text" class="form-control" id="validationServer02" required>
        </div>
        <div class="col-md-4">
            <label for="inputTipo" class="form-label">Marca</label>
            <select name="inputTipo" class="form-select" required>
                <option selected disabled value="">Elige</option>
                <option value="">...</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="validationServer05" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" required>
        </div>
        <div class="col-md-4">
            <label for="validationServer05" class="form-label">Serie</label>
            <input type="text" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" required>
        </div>
        <div class="col-md-3">
            <label for="validationServer05" class="form-label">Dominio</label>
            <input type="text" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" required>
        </div>
        <div class="col-md-3">
            <label for="validationServer05" class="form-label">Dirección IP</label>
            <input type="text" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" required>
        </div>
        <div class="col-md-3">
            <label for="validationServer05" class="form-label">Dirección Fisíca (MAC)</label>
            <input type="text" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" required>
        </div>
        <div class="col-md-3">
        <label for="inputTipo" class="form-label">Conectividad</label>
            <select name="inputTipo" class="form-select" required>
                <option selected disabled value="">Elige</option>
                <option value="1">Si</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="col-md-3">
        <label for="inputTipo" class="form-label">Procesador</label>
            <select name="inputTipo" class="form-select" required>
                <option selected disabled value="">Elige</option>
                <option value="">...</option>
                
            </select>
        </div>
        <div class="col-md-3">
            <label for="validationServer05" class="form-label">Capacidad Memoria</label>
            <input type="text" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" required>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Enviar formulario</button>
        </div>
    </form>
</div>
@endsection