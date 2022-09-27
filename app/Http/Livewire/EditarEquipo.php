<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


class EditarEquipo extends Component
{
    public $nombreEquipo;

    public function mount($nom){
        $this -> nombreEquipo = $nom;
    }

    public function render()
    {
        $equipo = DB::table("equipos as e")
        ->where('e.Nombre','=', $this -> nombreEquipo)
        ->select('e.Nombre', 'e.Codigo', 'e.MarcaEquipo', 'e.Modelo', 'e.Serie', 'e.Observacion',
                 'e.ProcesadorSecuencial', 'e.CapacidadMemoria', 'e.MarcaDisco1', 'e.CapacidadDisco1',
                 'e.MarcaDisco2', 'e.CapacidadDisco2', 'e.Secuencial', 'e.CedulaResponsable',
                 'e.SecuencialTipoEquipo')
        ->first();

        $procesadores = DB::table('procesador as p')
            ->select("p.Nombre as NombreProcesador", "p.Secuencial", "p.Velocidad")
            ->get();

        $marcas = DB::table('marca as m')
        ->select('m.Nombre', 'm.Secuencial')
        ->get();

        $responsables = DB::table('responsable as r')
        ->select(DB::raw("CONCAT(r.PrimerNombre, ' ',r.ApellidoPaterno, ' ', r.ApellidoMaterno ) AS NombreCompleto"), 
                         'r.Cedula')
        ->get();

        return view('livewire.editar-equipo', compact('equipo','marcas','responsables','procesadores'));
    }
}
