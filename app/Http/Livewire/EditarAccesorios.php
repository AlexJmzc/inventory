<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditarAccesorios extends Component
{
    public $sec;

   
    public function render()
    {
       
        $accesorio = DB::table("accesorios as a")
        ->where('a.Secuencial','=', $this -> sec)
        ->join('tipoaccesorio as tipo', 'a.SecuencialTipoAccesorio', '=', 'tipo.Secuencial')
        ->select('a.Codigo','a.Modelo', 'a.Serie','a.Descripcion', 'tipo.Nombre as Tipo', 'a.Secuencial')
        ->first();

        $marcas = DB::table('marca as m')
        ->select('m.Nombre', 'm.Secuencial')
        ->get();

        return view('livewire.editar-accesorios', compact('accesorio', 'marcas'));
    }
}
