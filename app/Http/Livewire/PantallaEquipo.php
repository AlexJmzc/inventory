<?php

namespace App\Http\Livewire;
use App\Models\Equipo;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PantallaEquipo extends Component
{
    public $aux;


    public function render()
    {
        $aux = 3;
        
        $equipo = DB::table('Equipos as e')
        ->join('responsable as r', 'e.CedulaResponsable','=', 'r.Cedula')
        ->join('departamento as d', 'd.Secuencial', '=', 'r.SecuencialDepartamento')
        ->join('marca as m', 'm.Secuencial', '=', 'e.MarcaEquipo')
        ->join('tipoEquipo as tipo', 'tipo.Secuencial', '=', 'e.SecuencialTipoEquipo')
        ->join('Programas as pro', 'e.Secuencial', '=', 'pro.SecuencialEquipo')
        ->where('pro.Nombre','=','Windows')
        ->join('TipoBits as bits', 'pro.Bits', '=', 'bits.Secuencial')
        ->orderby('d.NombreDepartamento', 'asc')
        ->select('e.Secuencial', 'd.NombreDepartamento',
             DB::raw("CONCAT(r.PrimerNombre, ' ',r.ApellidoPaterno, ' ', r.ApellidoMaterno ) AS NombreCompleto"),
            'e.Nombre', 'e.DireccionIP', 'e.DireccionMAC', 'm.Nombre AS Marca', 'tipo.Nombre AS Tipo',
            'pro.Nombre AS SO', 'pro.Version AS Version', 'bits.Nombre AS Bits', 'd.Direccion')
        ->get();
        
        return view('livewire.pantalla-equipo', compact('equipo','aux'));
    }
}
