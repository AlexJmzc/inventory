<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accesorio;
use Illuminate\Support\Facades\DB;

class AccesorioController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function render(){
        
    }
    public function index()
    {
        //
        $tipo = DB::table("tipoaccesorio as a")
        ->select("a.Nombre as Nombre","a.Secuencial as Secuencial")
        ->orderBy("a.Secuencial", "desc")
        ->get();
        return view('components.crear-accesorio', compact('tipo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $nuevo = new Accesorio();
        $nuevo->Secuencial=20;
        $nuevo->SecuencialTipoAccesorio= 1;
        $nuevo->Codigo = $request->inputCodigo;
        $nuevo ->Marca = 1;
        $nuevo->Serie = $request -> inputSerie;
        $nuevo->Modelo = $request->inputModelo;
        $nuevo->Descripcion = $request -> inputDescripcion;

        $nuevo->save();

        return redirect()->route('accesorios.index')->with('mensaje', 'Accesorio registrado');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accesorio  $accesorio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accesorio  $accesorio
     * @return \Illuminate\Http\Response
     */
    public function edit(Accesorio $accesorio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accesorio  $accesorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accesorio $accesorio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accesorio  $accesorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accesorio $accesorio)
    {
        //
    }
}


