<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DatosEquipo extends Component
{

    public $aux;

    public function mount($auxiliar){
        $this -> aux = $auxiliar;
    }

    public function render()
    {
        $equipo = DB::table('equipos as e')
        ->where('e.Secuencial', '=', $this -> aux)
        ->join('Responsable as res', 'res.Cedula', '=', 'e.CedulaResponsable')
        ->join('Departamento as d', 'd.Secuencial', '=', 'res.SecuencialDepartamento')
        ->join('Marca as m1', 'e.MarcaEquipo', '=', 'm1.Secuencial')
        ->join('Marca as m2', 'e.MarcaDisco1', '=', 'm2.Secuencial')
        ->join('Marca as m3', 'e.MarcaDisco2', '=', 'm3.Secuencial')
        ->join('Procesador as pro', 'e.ProcesadorSecuencial', '=', 'pro.Secuencial')
        ->join('TipoEquipo as tipo', 'e.SecuencialTipoEquipo', '=', 'tipo.Secuencial')
        ->select('e.Nombre as NombreEquipo', 'e.Codigo as CodigoEquipo', 'm1.Nombre as MarcaEquipo',
                 'e.Modelo as ModeloEquipo', 'e.Serie as SerieEquipo', 'e.Observacion',
                 'pro.Nombre as Procesador', 'pro.Velocidad', 'e.CapacidadMemoria as Memoria',
                 'm2.Nombre as MarcaDisco1', 'e.CapacidadDisco1', 'm3.Nombre as MarcaDisco2',
                 'e.CapacidadDisco2', 'd.CodigoDepartamento', 'd.NombreDepartamento','d.Direccion',
                    DB::raw("CONCAT(res.PrimerNombre, ' ',res.SegundoNombre) AS Nombres"),
                    DB::raw("CONCAT(res.ApellidoPaterno, ' ',res.ApellidoMaterno) AS Apellidos"),
                 'res.Cedula as CedulaResponsable', 'tipo.Nombre as TipoEquipo')
        ->get();
        return view('livewire.datos-equipo', compact('equipo'));
    }
}
