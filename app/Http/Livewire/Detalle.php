<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Detalle extends Component
{

    public string $cedula;


    public function mount($aux){
        $this->cedula = $aux;
    }

    
    public function render()
    {
        $cedula = '';
        $responsable = DB::table('Responsable as res')
        ->where('res.Cedula', '=', $this->cedula)
        ->join('departamento as d', 'd.Secuencial', '=', 'res.SecuencialDepartamento')
        ->select('d.Direccion', 'd.NombreDepartamento', 'd.CodigoDepartamento', 'res.Cedula',
             DB::raw("CONCAT(res.PrimerNombre, ' ',res.SegundoNombre) AS Nombres"),
             DB::raw("CONCAT(res.ApellidoPaterno, ' ',res.ApellidoMaterno) AS Apellidos"))
        ->first();
        return view('livewire.detalle', compact('responsable'));
    }
}
