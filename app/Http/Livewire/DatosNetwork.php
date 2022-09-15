<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DatosNetwork extends Component
{
    public string $secuencialequipo;

    public function render()
    {
        $secuencialequipo = '';
        $network = DB::table('Equipos as e')
        ->where('e.Secuencial', '=', 1)
        ->join('Marca as m', 'e.MarcaImpresora', '=', 'm.Secuencial')
        ->select('e.Nombre', 'e.Dominio', 'e.PoseeConectividad as Conectividad', 'e.DireccionIP',
                 'e.DireccionMAC', 'e.ConectividadImpresora', 'm.Nombre as Marca', 'e.IPImpresora')
        ->get();
        return view('livewire.datos-network', compact('network'));
    }
}
