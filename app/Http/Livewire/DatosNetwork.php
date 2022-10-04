<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Equipo;
use Illuminate\Http\Request;

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
                 'e.DireccionMAC', 'e.ConectividadImpresora', 'm.Nombre as Marca', 'e.IPImpresora',
                 'e.Secuencial')
        ->get();
        
        return view('livewire.datos-network', compact('network'));
    }

    

    public function update(Request $request)
    {
       
        $secEquipo = $request -> inputSecuencial;

        $equipo = DB::table("equipos as e")
        ->where('e.Secuencial', '=', $secEquipo)
        ->select("e.Secuencial")
        ->first();
        
        $nombre = 'network';
        $networkActualizar = Equipo::find($secEquipo);


        $networkActualizar -> Dominio = $request -> inputDominio;
        $networkActualizar -> PoseeConectividad = $request -> inputConectividad;
        $networkActualizar -> DireccionIP = $request -> inputIP;
        $networkActualizar -> DireccionMAC = $request -> inputMAC;
        $networkActualizar -> ConectividadImpresora = $request -> inputConectividadImpresora;
        $networkActualizar -> MarcaImpresora = $request -> MarcaImpresora;
        $networkActualizar -> IPImpresora = $request -> inputIPImpresora;
        
        $networkActualizar->save();
        

        return view('livewire.principal', compact('equipo', 'nombre'));
    }
}
