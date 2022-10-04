<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditarNetwork extends Component
{
    public $nombreEquipo;

    public function mount($nom){
        $this -> nombreEquipo = $nom;
    }


    
    public function render()
    {
        $network = DB::table("equipos as e")
        ->where('e.Nombre','=', $this -> nombreEquipo)
        ->select('e.Nombre', 'e.Dominio', 'e.DireccionIP as IP', 'e.DireccionMAC as MAC', 'e.PoseeConectividad',
                 'e.ConectividadImpresora', 'e.IPImpresora', 'e.MarcaImpresora', 'e.Secuencial')
        ->first();

        $marcas = DB::table('marca as m')
        ->select('m.Nombre', 'm.Secuencial')
        ->get();

        return view('livewire.editar-network', compact('network','marcas'));
    }
}
