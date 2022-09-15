<?php

namespace App\Http\Livewire;
use App\Models\Equipo;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PantallaEquipo extends Component
{
    public $aux;

    public function mount($auxiliar){
        $this->aux = $auxiliar;
        $this->emit('parametro', $this->aux);
    }

    public function render()
    {
        
        
        $equipo = DB::table('Equipos as e')
        ->where('e.Secuencial','=', $this->aux)
            ->join('responsable as r', 'e.CedulaResponsable','=', 'r.Cedula')
            ->join('departamento as d', 'd.Secuencial', '=', 'r.SecuencialDepartamento')
            ->join('marca as m', 'm.Secuencial', '=', 'e.MarcaEquipo')
            ->join('tipoEquipo as tipo', 'tipo.Secuencial', '=', 'e.SecuencialTipoEquipo')
            ->join('ProgramaEquipo as pro', 'e.Secuencial', '=', 'pro.SecuencialEquipo')
            ->join('Programas as programas', 'pro.SecuencialPrograma', '=', 'programas.Secuencial')
            ->where('programas.Descripcion','=','SISTEMA OPERATIVO')
            ->join('TipoBits as bits', 'pro.Bits', '=', 'bits.Secuencial')
        ->select('e.Secuencial', 'd.NombreDepartamento',
             DB::raw("CONCAT(r.PrimerNombre, ' ',r.ApellidoPaterno, ' ', r.ApellidoMaterno ) AS NombreCompleto"),
            'e.Nombre', 'e.DireccionIP', 'e.DireccionMAC', 'm.Nombre AS Marca', 'tipo.Nombre AS Tipo',
            'programas.Nombre AS SO', 'programas.Version AS Version', 'bits.Nombre AS Bits', 'd.Direccion', 'r.Cedula')
        ->get();
        
        return view('livewire.pantalla-equipo', compact('equipo'));
    }
    

}
