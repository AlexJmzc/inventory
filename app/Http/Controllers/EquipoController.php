<?php

namespace App\Http\Controllers;

use App\Models\Accesorio;
use App\Models\Detalle;
use App\Models\Equipo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $name = 'pantalla-equipo';

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




        return view('livewire.tabla-equipos', compact('equipos', 'eq'))
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

        $programas = DB::table('programas')
        ->select('Nombre', 'Secuencial', 'Version')
        ->get();

        $equipo = new Equipo();
        return view('components.crear-equipo', compact('equipo','marcas', 'procesadores', 'programas'));
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

        $accesorio = new Accesorio();
        // mouse
        $accesorio->SecuencialTipoAccesorio =  $request->inputMouse;
        $accesorio->Codigo = $request->codigoMouse;
        $accesorio->Serie = $request->serieMouse;
        $accesorio->Marca = $request->inputMarcaMouse;
        $accesorio->Descripcion = $request->inputDescripcionMouse;
        $accesorio->save();

        // teclado
        $accesorio1 = new Accesorio();
        $accesorio1->SecuencialTipoAccesorio =  $request->inputTeclado;
        $accesorio1->Codigo = $request->codigoTeclado;
        $accesorio1->Serie = $request->serieTeclado;
        $accesorio1->Marca = $request->inputMarcaTeclado;
        $accesorio1->Descripcion = $request->inputDescripcionTeclado;
        $accesorio1->save();


        // monitor
        $accesorio2 = new Accesorio();
        $accesorio2->SecuencialTipoAccesorio =  $request->inputMonitor;
        $accesorio2->Codigo = $request->codigoMonitor;
        $accesorio2->Serie = $request->serieMonitor;
        $accesorio2->Marca = $request->inputMarcaMonitor;
        $accesorio2->Descripcion = $request->inputDescripcionMonitor;
        $accesorio2->save();


        // parlantes

        if( !empty($request->codigoParlantes)){
            $accesorio3 = new Accesorio();
            $accesorio3->SecuencialTipoAccesorio =  $request->inputParlantes;
            $accesorio3->Codigo = $request->codigoParlantes;
            $accesorio3->Serie = $request->serieParlantes;
            $accesorio3->Marca = $request->inputMarcaParlantes;
            $accesorio3->Descripcion = $request->inputDescripcionParlantes;
            $accesorio3->save();
        }

        //detalle
        // fecha_Actual
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        

        // conseguir Secuencial Accesorios
        $acc = DB::table('accesorios as a')
        ->where('a.Secuencial', '=',$request->codigoMouse)
        ->select('a.Secuencial')
        ->get();

        $acc1 = DB::table('accesorios as a')
        ->where('a.Secuencial', '=', $request->codigoTeclado)
        ->select('a.Secuencial')
        ->get();

        $acc2 = DB::table('accesorios as a')
        ->where('a.Secuencial', '=', $request->codigoMonitor)
        ->select('a.Secuencial')
        ->get();

        if( !empty($request->codigoParlantes)){
            $acc3 = DB::table('accesorios as a')
            ->where('a.Secuencial', '=', $request->codigoParlantes)
            ->select('a.Secuencial');

            $detalle3 = new Detalle();        
            $detalle3->ResponsableCedula = $request->cedulaResponsable;
            $detalle3->AccesoriosSecuencial = 3;
            $detalle3->FechaEntrega = $date;
            $detalle3->save();
        }            

        
        $detalle = new Detalle();        
        $detalle->ResponsableCedula = $request->cedulaResponsable;
        $detalle->AccesoriosSecuencial = 1;
        $detalle->FechaEntrega = $date;        
        $detalle->save();

        $detalle = new Detalle();        
        $detalle->ResponsableCedula = $request->cedulaResponsable;
        $detalle->AccesoriosSecuencial = 2;
        $detalle->FechaEntrega = $date;        
        $detalle->save();

        $detalle2 = new Detalle();        
        $detalle2->ResponsableCedula = $request->cedulaResponsable;
        $detalle2->AccesoriosSecuencial = 4;
        $detalle2->FechaEntrega = $date;
        $detalle2->save();



        // programas
        if( !empty($request->listaProgramas)){
            foreach($request->listaProgramas as $programa){                
                
            }

        }


        return redirect()->route('equipos.index')
            ->with('success', 'Equipo agregado correctamente');
    }
    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    // public function show(Request $request)
    public function show(Request $request)
    {
        $id = $request->get('aux');
        //dd($request);
        // $nombre = 'pantalla-equipo';
        $nombre = $request->get('name');
        //dd($nombre);
        $equipo = DB::table('equipos as e')
        ->where('e.Secuencial', $id)
        ->first();

        return view ('livewire.principal', compact('equipo','nombre'));
    }


    public function a($nom, $ax){
        $name1 = $nom + $ax;
        return $this->$name1;
    }

    public function ver($id, $nom){
        $nombre = $nom;
        echo '<script type="text/javascript">' .
          'console.log(' . $nombre . ');</script>';
        $equipo = DB::table('equipos as e')
        ->where('e.Secuencial', $id)
        ->first();

        return view ('livewire.principal', compact('equipo','nombre'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $equipo= Equipo::find($id);

        return view('detalleequipos', compact('equipo'));
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
        $equipo ->update($request->all());

        return redirect()->route('equipos.index')
        ->with('success', 'Equipo actualizado');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
    }
}
