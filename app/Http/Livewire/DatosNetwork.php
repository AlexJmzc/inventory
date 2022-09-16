<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DatosNetwork extends Component
{
    public $aux;

    public function mount($auxiliar){
        $this -> aux = $auxiliar;
    }

    public function render()
    {
        $network = DB::table('Equipos as e')
        ->where('e.Secuencial', '=', $this -> aux)
        ->join('Marca as m', 'e.MarcaImpresora', '=', 'm.Secuencial')
        ->select('e.Nombre', 'e.Dominio', 'e.PoseeConectividad as Conectividad', 'e.DireccionIP',
                 'e.DireccionMAC', 'e.ConectividadImpresora', 'm.Nombre as Marca', 'e.IPImpresora')
        ->get();
        return view('livewire.datos-network', compact('network'));
    }
}
