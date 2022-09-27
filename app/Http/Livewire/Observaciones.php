<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Observaciones extends Component
{

    public $secuencialAccesorio;

    public function mount($secuencial){
        $this -> secuencialAccesorio = $secuencial; 
    }


    public function render()
    {
        $datos = DB::table('accesorios as a')
        ->where('a.Secuencial','=',$this -> secuencialAccesorio)
        ->join('tipoaccesorio as tipo','a.SecuencialTipoAccesorio','=','tipo.Secuencial')
        ->select('a.Codigo','tipo.Nombre')
        ->first();

        $observaciones = DB::table('Observacion as o')
        ->where('o.AccesoriosSecuencial', '=', $this -> secuencialAccesorio)
        ->join('accesorios as a', 'a.Secuencial', '=', 'o.AccesoriosSecuencial')
        ->join('tipoaccesorio as tipo', 'a.SecuencialTipoAccesorio', '=', 'tipo.Secuencial')
        ->select('o.Descripcion','tipo.Nombre', 'a.Codigo')
        ->get();

        if($observaciones -> isEmpty()){
            $observaciones == null;
        }
                
        
        return view('livewire.observaciones', compact('observaciones','datos'));
    }
}
