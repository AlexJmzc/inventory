<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\AccesorioController;
use App\Http\Controllers\ReporteController;
use App\Http\Livewire\DatosProgramas;
use App\Http\Livewire\DatosNetwork;
use App\Http\Livewire\DatosEquipo;
use App\Http\Livewire\Observacion;
use App\Http\Livewire\Request;




Route::resource('/equipos', EquipoController::class);

Route::resource('/accesorios', AccesorioController::class);

Route::resource('/software', DatosProgramas::class);

Route::resource('/network', DatosNetwork::class);

Route::resource('/observacion', Observacion::class);


Route::group(['middleware' => 'keycloak-web'], function () {
    Route::get('/');
});


Route::get('reportes',[EquipoController::class,'pdf'])->name('equipos.pdf');


//Route::get('/equipos/{id}/{name}', EquipoController::class)->name('equipos.ver');


Route::get('/ce', function () {
    return view('components.crear-equipo');
});

Route::get('/se', function () {
    return view('components.crear-equipo');
});