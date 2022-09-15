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
        $observaciones = DB::table('Observacion as o')
        ->where('o.AccesoriosSecuencial', '=', $this -> secuencialAccesorio)
        ->select('o.Descripcion',)
        ->get();
        return view('livewire.observaciones', compact('observaciones'));
    }
}
