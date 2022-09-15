<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


class DatosProgramas extends Component
{

    public $secuencialequipo;


    public function render()
    {

        $programas = DB::table('programaequipo as pro')
        ->where('pro.SecuencialEquipo', '=', 31)
        ->join('equipos as e', 'pro.SecuencialEquipo', '=', 'e.Secuencial')
        ->join('programas as programas', 'pro.SecuencialPrograma', '=', 'programas.Secuencial')
        ->where('programas.Descripcion', '=', '')
        ->join('tipobits as bits', 'pro.Bits', '=', 'bits.Secuencial')
        ->select('programas.Nombre as Programa', 'programas.Version', 'pro.Licencia', 'pro.Activo',
                 'bits.Nombre as Bits', 'e.Nombre as NombreEquipo')
        ->get();
        return view('livewire.datos-programas', compact('programas'));
    }
}
