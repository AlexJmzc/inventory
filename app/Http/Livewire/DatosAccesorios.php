<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DatosAccesorios extends Component
{
    public function render()
    {
        $secuencialequipo = '';
        $accesorios = DB::table('Detalle as de')
        ->where('de.SecuencialEquipo', '=', 1)
        ->join('Equipos as e', 'e.Secuencial', '=', 'de.SecuencialEquipo')
        ->join('Responsable as res', 'res.Cedula', '=', 'de.ResponsableCedula')
        ->join('Departamento as d', 'd.Secuencial', '=', 'res.SecuencialDepartamento')
        ->join('Accesorios as a', 'a.Secuencial', '=', 'de.AccesoriosSecuencial')
        ->join('TipoAccesorio as tipo', 'tipo.Secuencial', '=', 'a.SecuencialTipoAccesorio')
        ->join('Marca as m', 'a.Marca', '=', 'm.Secuencial')
        ->join('Observacion as o', 'o.AccesoriosSecuencial', '=', 'a.Secuencial')

        ->select('de.ResponsableCedula as Cedula',
                    DB::raw("CONCAT(res.PrimerNombre, ' ',res.SegundoNombre) AS Nombres"),
                    DB::raw("CONCAT(res.ApellidoPaterno, ' ',res.ApellidoMaterno) AS Apellidos"),
                 'e.Nombre as NombreEquipo', 'tipo.Nombre as TipoAccesorio', 'a.Codigo as CodigoAccesorio',
                 'd.NombreDepartamento', 'd.Direccion', 'm.Nombre as Marca', 'a.Serie', 'a.Modelo',
                 'tipo.EntradaSalida', 'a.Descripcion as DescripcionAccesorio', 'o.Descripcion')
        ->get();
        return view('livewire.datos-accesorios', compact('accesorios','secuencialequipo'));
    }
}
