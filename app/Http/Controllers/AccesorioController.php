<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accesorio;
use App\Models\Detalle;
use Carbon\Carbon;
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
        
        return view('livewire.principal', compact('tipo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo = DB::table('tipoaccesorio')
            ->select("Nombre", "Secuencial")
            ->get();


            
        return view('livewire.datos-accesorios', compact('tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
        $nuevo = new Accesorio();
        $nuevo -> SecuencialTipoAccesorio= $request->inputTipo;
        $nuevo -> Codigo = $request->inputCodigo;
        $nuevo -> Marca = 1;
        $nuevo -> Serie = $request -> inputSerie;
        $nuevo -> Modelo = $request->inputModelo;
        $nuevo -> Descripcion = $request -> inputDescripcion;
        $nuevo->save();

        $nombreEquipo = $request -> inputNombreEquipo;
        $nombre = 'datos-accesorios';
        
        $equipo = DB::table('equipos as e')
            ->where('e.Nombre', '=', $nombreEquipo)
            ->select("e.Secuencial", "e.CedulaResponsable")
            ->first();
        

        //Fecha
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        //Detalle Accesorio
        self::AgregarDetalle($equipo -> CedulaResponsable, $nuevo -> Codigo, 
                             $date, $equipo -> Secuencial);

        
        DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return view('livewire.principal', compact('equipo', 'nombre'));
    }


    public function AgregarDetalle($cedulaDetalle, $codigo, $date,$secEquipo)
    {
        $acces = DB::table('accesorios as a')
            ->where('a.Codigo', '=', $codigo)
            ->select('a.Secuencial')
            ->first();

        $detalle = new Detalle();
        $detalle->ResponsableCedula = $cedulaDetalle;
        $detalle->EquipoSecuencial = $secEquipo;
        $detalle->AccesoriosSecuencial = $acces->Secuencial;
        $detalle->FechaEntrega = $date;
        $detalle->FechaDevolucion = '';
        $detalle->save();
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
    public function edit($id)
    {
        $accesorio = Equipo::find($id);

        return view('detalleequipos', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accesorio  $accesorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $secAccesorio = $request -> inputSecuencial;
        $equipo = DB::table('detalle as de')
            ->where('de.AccesoriosSecuencial', '=', $secAccesorio)
            ->join('equipos as e', 'e.Secuencial','=','de.EquipoSecuencial')
            ->select("e.Secuencial")
            ->first();
        
        
        $nombre = 'datos-accesorios';
        $accesorioActualizar = Accesorio::find($secAccesorio);

        $accesorioActualizar -> Codigo = $request -> inputCodigo;
        $accesorioActualizar -> Marca = $request -> MarcaAccesorio;
        $accesorioActualizar -> Serie = $request -> inputSerie;
        $accesorioActualizar -> Modelo = $request -> inputModelo;
        $accesorioActualizar -> Descripcion = $request -> inputDescripcion;
        
        $accesorioActualizar->save();

        return view('livewire.principal', compact('equipo', 'nombre'));
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


