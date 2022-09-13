<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Detalle extends Component
{

    public string $cedula;
    public function render()
    {
        $cedula = '';
        $responsable = DB::table('Responsable as res')
        ->where('res.Cedula', '=', '1802')
        ->join('departamento as d', 'd.Secuencial', '=', 'res.SecuencialDepartamento')
        ->select('d.Direccion', 'd.NombreDepartamento', 'd.CodigoDepartamento', 'res.Cedula',
             DB::raw("CONCAT(res.PrimerNombre, ' ',res.SegundoNombre) AS Nombres"),
             DB::raw("CONCAT(res.ApellidoPaterno, ' ',res.ApellidoMaterno) AS Apellidos"),
             'res.FechaNacimiento')
        ->get();
        return view('livewire.detalle', compact('responsable','cedula'));
    }
}
