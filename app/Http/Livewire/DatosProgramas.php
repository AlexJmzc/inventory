<?php

namespace App\Http\Livewire;

use App\Models\Programaequipo;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class DatosProgramas extends Component
{

    public $aux;

    public function mount($auxiliar)
    {
        $this->aux = $auxiliar;
    }

    public function render()
    {
        $equipo = DB::table('equipos as e')
            ->where('e.Secuencial','=',$this->aux)
            ->select('e.Nombre','e.Secuencial')
            ->first();

        $programas = DB::table('programaequipo as pro')
            ->where('pro.SecuencialEquipo', '=', $this->aux)
            ->join('equipos as e', 'pro.SecuencialEquipo', '=', 'e.Secuencial')
            ->join('programas as programas', 'pro.SecuencialPrograma', '=', 'programas.Secuencial')
            ->where('programas.Descripcion', '=', '')
            ->join('tipobits as bits', 'pro.Bits', '=', 'bits.Secuencial')
            ->select(
                'programas.Nombre as Programa',
                'programas.Version',
                'pro.Licencia',
                'pro.Activo',
                'bits.Nombre as Bits',
                'e.Nombre as NombreEquipo',
                'e.Secuencial as Secuencial'
            )
            ->get();

        if($programas -> isEmpty()){
            $programas = null;
        }


        $listaProgramas = DB::table('programas')
            ->where('Descripcion', '<>', 'SISTEMA OPERATIVO')
            ->select('Nombre', 'Secuencial', 'Version')
            ->get();
        return view('livewire.datos-programas', compact('programas', 'listaProgramas','equipo'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $aux = $request->inputNombreEquipoProgramas;
            $nombre = 'software';

            $equipo = DB::table('equipos as e')
                ->where('e.Nombre', '=', $aux)
                ->select("e.Secuencial as Secuencial", "e.CedulaResponsable")
                ->first();


            if (!empty($request->listaProgramasNuevo)) {

                foreach ($request->listaProgramasNuevo as $item) {
                    $programa = new Programaequipo();
                    $programa->SecuencialPrograma = $item;
                    $programa->SecuencialEquipo = $equipo->Secuencial;
                    $programa->Bits = 1;
                    $programa->Licencia = 1;
                    $programa->Activo = 1;
                    $programa->save();
                }
            }


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return view('livewire.principal', compact('equipo', 'nombre'));
    }
}
