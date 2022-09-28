<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\AccesorioController;
use App\Http\Controllers\ReporteController;
use App\Http\Livewire\DatosProgramas;
use App\Http\Livewire\DatosNetwork;
use App\Http\Livewire\DatosEquipo;
use App\Http\Livewire\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------------    -------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('/equipos', EquipoController::class);

Route::resource('/accesorios', AccesorioController::class);

Route::resource('/software', DatosProgramas::class);

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



Route::get('/principal', function () {
    return view('livewire.principal');
});