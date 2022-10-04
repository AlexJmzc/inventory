<?php

namespace App\Http\Controllers;

use App\Models\Accesorio;
use App\Models\Detalle;
use App\Models\Equipo;
use App\Exports\EquipoExport;
use App\Models\Programa;
use App\Models\Programaequipo;

use Carbon\Carbon;
use Hamcrest\Text\IsEqualIgnoringCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

use function PHPUnit\Framework\isEmpty;

class EquipoController extends Controller
{
    
    public $name = 'pantalla-equipo';
   

    public function index()
    {
        
        $eq = Equipo::paginate();

        $equipos = DB::table('equipos as e')
            ->join('responsable as r', 'e.CedulaResponsable', '=', 'r.Cedula')
            ->join('departamento as d', 'd.Secuencial', '=', 'r.SecuencialDepartamento')
            ->orderby('d.NombreDepartamento', 'asc')
            ->select('e.Secuencial', 'd.NombreDepartamento', DB::raw("CONCAT(r.PrimerNombre, ' ',r.ApellidoPaterno, ' ', r.ApellidoMaterno ) AS NombreCompleto"),
                     'e.Nombre', 'e.DireccionIP', 'e.CedulaResponsable', 'r.Codigo as CodigoResponsable')
            ->get();

        return view('livewire.tabla-equipos', compact('equipos', 'eq'))
            ->with('i', (request()->input('page', 1) - 1) * $eq->perPage());
    }


    //Metodo para reporte en PDF
    public function pdf()
    {
        $equipos = DB::table('equipos as e')
        ->join('responsable as r', 'e.CedulaResponsable', '=', 'r.Cedula')
        ->join('departamento as d', 'd.Secuencial', '=', 'r.SecuencialDepartamento')
        ->orderby('d.NombreDepartamento', 'asc')
        ->select('r.Codigo','r.Cedula', 'd.NombreDepartamento', DB::raw("CONCAT(r.PrimerNombre, ' ',r.ApellidoPaterno, ' ', r.ApellidoMaterno ) AS NombreCompleto"), 'e.Nombre', 'e.DireccionIP')
        ->get();
       
        $pdf = Pdf::loadView('reportes',['equipos'=>$equipos]);
        $pdf->setPaper('A4','landscape');
       
        return $pdf -> stream();
    }

    
    
    public function create()
    {
       
        $marcas = DB::table('marca')
            ->select("Nombre", "Secuencial")
            ->get();

        $procesadores = DB::table('procesador')
            ->select("Nombre", "Secuencial")
            ->get();

        $programas = DB::table('programas')
            ->select('Nombre', 'Secuencial', 'Version', 'Descripcion')
            ->get();

        $equipo = new Equipo();
        return view('components.crear-equipo', compact('equipo', 'marcas', 'procesadores', 'programas'));
    }

   

    public function store(Request $request)
    {
        
        DB::beginTransaction();
        try {
            $ced = $request->cedulaResponsable;
            $codMouse = $request->codigoMouse;
            $codTeclado = $request->codigoTeclado;
            $codMonitor = $request->codigoMonitor;

            $equipo = new Equipo();
            $equipo->SecuencialTipoEquipo = $request->inputTipoEquipo;
            $equipo->CedulaResponsable = $request->cedulaResponsable;
            $equipo->ProcesadorSecuencial = $request->inputProcesador;
            $equipo->Nombre = $request->nombreEquipo;
            $equipo->Codigo = $request->codigoEquipo;
            $equipo->MarcaEquipo = $request->inputMarcaEquipo;
            $equipo->Modelo = $request->modeloEquipo;
            $equipo->Serie = $request->serieEquipo;
            $equipo->Observacion = $request->inputDescripcion;
            $equipo->DireccionIP = $request->direccionIP;
            $equipo->DireccionMAC = $request->direccionMAC;
            $equipo->Dominio = $request->inputDominio;
            $equipo->PoseeConectividad = $request->inputConectividad;
            $equipo->IPImpresora = $request->ipImpresora;
            $equipo->ConectividadImpresora = $request->inputConectividadImpresora;
            $equipo->MarcaImpresora = $request->inputMarcaImpresora;
            $equipo->MarcaDisco1 = $request->inputMarcaDisco;
            $equipo->CapacidadDisco1 = $request->capacidadDisco;
            $equipo->MarcaDisco2 = $request->inputMarcaDisco2;
            $equipo->CapacidadDisco2 = $request->capacidadDisco2;
            $equipo->CapacidadMemoria = $request->memoriaRAM;

            $equipo->save();

            //Mouse
            self::AgregarAccesorio(
                '',
                $request->inputMarcaMouse,
                $request->serieMouse,
                $request->inputDescripcionMouse,
                $request->inputMouse,
                $request->codigoMouse
            );
            //Teclado
            self::AgregarAccesorio(
                '',
                $request->inputMarcaTeclado,
                $request->serieTeclado,
                $request->inputDescripcionTeclado,
                $request->inputTeclado,
                $request->codigoTeclado
            );
            //Monitor
            self::AgregarAccesorio(
                $request->modeloMonitor,
                $request->inputMarcaMonitor,
                $request->serieMonitor,
                $request->inputDescripcionMonitor,
                $request->inputMonitor,
                $request->codigoMonitor
            );


            //Parlantes
            if (!empty($request->codigoParlantes)) {
                self::AgregarAccesorio(
                    '',
                    $request->inputMarcaParlantes,
                    $request->serieParlantes,
                    $request->inputDescripcionParlantes,
                    $request->inputParlantes,
                    $request->codigoParlantes
                );
            }

            $codEquipo = $request->codigoEquipo;

            //Buscar-equipo
            $secEquipo = DB::table('equipos')
                ->where("Codigo", "=", $codEquipo)
                ->select("Secuencial")
                ->first();

            //Fecha
            $date = Carbon::now();
            $date = $date->format('Y-m-d');

            //Detalle Mouse
            self::AgregarDetalle($ced, $codMouse, $date, $secEquipo->Secuencial);

            //Detalle Teclado
            self::AgregarDetalle($ced, $codTeclado, $date, $secEquipo->Secuencial);

            //Detalle Monitor
            self::AgregarDetalle($ced, $codMonitor, $date, $secEquipo->Secuencial);

            //Detalle Parlantes
            if (!empty($request->codigoParlantes)) {
                $codParlantes = $request->codigoParlantes;
                self::AgregarDetalle($ced, $codParlantes, $date, $secEquipo->Secuencial);
            }


            //Programas
            self::programasEquipo($request->listaProgramas, $secEquipo, $request->itemSO, $request->itemActivacionSO,$request->itemBits);
            self::programasEquipo($request->listaProgramasOtros, $secEquipo, $request->itemOtros, $request->itemActivacionOtros, $request->itemBits);
            self::programasEquipo($request->listaProgramasOfimatica, $secEquipo, $request->itemOfimatica, $request->itemActivacionOfimatica, $request->itemBits);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }





        return redirect()->route('equipos.index')
            ->with('success', 'Equipo agregado correctamente');
    }



    public function programasEquipo($lista, $secEquipo, $licencia,$activacion, $bits)
    {
        if (!empty($lista)) {
            foreach ($lista as $item) {
                $programas = new Programaequipo();
                $programas->SecuencialEquipo = $secEquipo->Secuencial;
                $programas->SecuencialPrograma = $item;
                $programas->Bits = $bits;

                if (empty($licencia)) {
                    $programas->Licencia = 0;
                
                }else{
                    $programas->Licencia = 1;
                }
                if(empty($activacion)){
                    $programas->Activo = 0;
                }else{
                    $programas->Activo = 1;
                }

                
                $programas->save();
            }
        }


    }




    public function AgregarAccesorio($modelo, $marca, $serie, $descripcion, $tipo, $codigo)
    {
        $accesorio = new Accesorio();
        $accesorio->SecuencialTipoAccesorio =  $tipo;
        $accesorio->Codigo = $codigo;
        $accesorio->Serie = $serie;
        $accesorio->Modelo = $modelo;
        $accesorio->Marca = $marca;
        $accesorio->Descripcion = $descripcion;
        $accesorio->save();
    }


    public function AgregarDetalle($cedulaDetalle, $codigo, $date, $secEquipo)
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
    


    public function show(Request $request)
    {
        $id = $request->get('aux');
        
        $nombre = $request->get('name');
        
        $equipo = DB::table('equipos as e')
            ->where('e.Secuencial', $id)
            ->first();

        return view('livewire.principal', compact('equipo', 'nombre'));
    }


    public function edit($id)
    {
        $equipo = Equipo::find($id);

        return view('detalleequipos', compact('equipo'));
    }

    

    public function update(Request $request, Equipo $equipo)
    {
        $equipo->update($request->all());

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo actualizado');
    }



    public function destroy(Equipo $equipo){}
}
