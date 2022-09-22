<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Observaciones extends Component
{

    public $secuencialAccesorio;

    /*public function mount($secuencial){
        $this -> secuencialAccesorio = $secuencial; 
    }*/

    /*public function __construct(Request $request){
        $this -> secuencialAccesorio = $request -> secuencial;
        dd($request);
    }*/

    /*public function boot($secuencial){
       $this -> secuencialAccesorio = $secuencial;
    } */


    public function render()
    {
        $observaciones = DB::table('Observacion as o')
        ->where('o.AccesoriosSecuencial', '=', $this -> secuencialAccesorio)
        ->join('accesorios as a', 'a.Secuencial', '=', 'o.AccesoriosSecuencial')
        ->join('tipoaccesorio as tipo', 'a.SecuencialTipoAccesorio', '=', 'tipo.Secuencial')
        ->select('o.Descripcion','tipo.Nombre', 'a.Codigo')
        ->get();
        
        return view('livewire.observaciones', compact('observaciones'));
    }
}
