<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $eq = Equipo::paginate();

        $equipos= DB::table('equipos as e')
        ->join('responsable as r', 'e.CedulaResponsable','=', 'r.Cedula')
        ->join('departamento as d', 'd.Secuencial', '=', 'r.SecuencialDepartamento')
        ->orderby('d.NombreDepartamento', 'asc')
        ->select('e.Secuencial', 'd.NombreDepartamento', DB::raw("CONCAT(r.PrimerNombre, ' ',r.ApellidoPaterno, ' ', r.ApellidoMaterno ) AS NombreCompleto"), 'e.Nombre', 'e.DireccionIP')
        ->get();




        return view('livewire.tabla-equipos', compact('equipos'))
            ->with('i', (request()->input('page', 1) - 1) * $eq->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $marcas=DB::table('marca')
        ->select("Nombre", "Secuencial")
        ->get();

        $procesadores = DB::table('procesador')
        ->select("Nombre", "Secuencial")
        ->get();

        $equipo = new Equipo();
        return view('components.crear-equipo', compact('equipo','marcas', 'procesadores'));
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
        $equipo = new Equipo();
        $equipo->SecuencialTipoEquipo = $request->inputTipoEquipo;
        $equipo ->CedulaResponsable = $request->cedulaResponsable;
        $equipo->ProcesadorSecuencial= $request->inputProcesador;
        $equipo->Nombre= $request->nombreEquipo;
        $equipo->Codigo= $request -> codigoEquipo;
        $equipo ->MarcaEquipo= $request ->inputMarcaEquipo;
        $equipo->Modelo= $request ->modeloEquipo;
        $equipo ->Serie = $request ->serieEquipo;
        $equipo ->Observacion = $request->inputDescripcion;
        $equipo ->DireccionIP = $request->direccionIP;
        $equipo -> DireccionMAC= $request ->direccionMAC;
        $equipo -> Dominio= $request->inputDominio;
        $equipo ->PoseeConectividad= $request->inputConectividad;
        $equipo->IPImpresora= $request->ipImpresora;
        $equipo -> ConectividadImpresora = $request->inputConectividadImpresora;
        $equipo -> MarcaImpresora= $request->inputMarcaImpresora;
        $equipo->MarcaDisco1 = $request->inputMarcaDisco;
        $equipo -> CapacidadDisco1 =$request->capacidadDisco;
        $equipo->MarcaDisco2 = $request->inputMarcaDisco2;
        $equipo -> CapacidadDisco2 =$request->capacidadDisco2;
        $equipo ->CapacidadMemoria = $request->memoriaRAM;

        $equipo->save();

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo agregado correctamente');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       // $equipo=Equipo::find($Secuencial);
        // return view ('livewire.detalle', compact('equipo'));
        $equipo = DB::table('equipos as e')
        ->where('e.Secuencial', $id)
        ->first();

        return view ('detalleequipos', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        //
    }
}
