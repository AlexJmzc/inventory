<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\AccesorioController;
use App\Http\Controllers\ReporteController;
use App\Http\Livewire\DatosAccesorios;
use App\Http\Livewire\DatosProgramas;
use App\Http\Livewire\DatosNetwork;
use App\Http\Livewire\DatosEquipo;
use App\Http\Livewire\Observaciones;
use App\Http\Livewire\Request;


//Route::group(['middleware' => 'keycloak-web'], function () {
    Route::get('/', [EquipoController::class, 'index']);

    Route::resource('/equipos', EquipoController::class);

    Route::resource('/accesorios', AccesorioController::class);

    Route::resource('/software', DatosProgramas::class);

    Route::resource('/network', DatosNetwork::class);

    Route::resource('/equipo', DatosEquipo::class);

    Route::resource('/observacion', Observaciones::class);

    Route::get('reportes',[EquipoController::class,'pdf'])->name('equipos.pdf');
    
//});
