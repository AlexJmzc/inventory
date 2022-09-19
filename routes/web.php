<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\AccesorioController;

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

//Route::get('/equipos/{id}/{name}', EquipoController::class)->name('equipos.ver');


Route::get('/ce', function () {
    return view('components.crear-equipo');
});



Route::get('/principal', function () {
    return view('livewire.principal');
});