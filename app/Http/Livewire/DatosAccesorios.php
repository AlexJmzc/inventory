<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DatosAccesorios extends Component
{

    public $aux;
    

    
    
    public function mount($auxiliar){
        $this->aux = $auxiliar;
    }

    public function render()
    {
        $equipo = DB::table('equipos as e')
        ->where('e.Secuencial', '=', $this -> aux)
        ->select('e.Nombre')
        ->first();

        $accesorios = DB::table('Detalle as de')
        ->where('de.EquipoSecuencial', '=', $this -> aux)
        ->where('de.Activo', '=', 1)
        ->join('Equipos as e', 'e.Secuencial', '=', 'de.EquipoSecuencial')
        ->join('Responsable as res', 'res.Cedula', '=', 'de.ResponsableCedula')
        ->join('Departamento as d', 'd.Secuencial', '=', 'res.SecuencialDepartamento')
        ->join('Accesorios as a', 'a.Secuencial', '=', 'de.AccesoriosSecuencial')
        ->join('TipoAccesorio as tipo', 'tipo.Secuencial', '=', 'a.SecuencialTipoAccesorio')
        ->join('Marca as m', 'a.Marca', '=', 'm.Secuencial')
        ->select('de.ResponsableCedula as Cedula',
                    DB::raw("CONCAT(res.PrimerNombre, ' ',res.SegundoNombre) AS Nombres"),
                    DB::raw("CONCAT(res.ApellidoPaterno, ' ',res.ApellidoMaterno) AS Apellidos"),
                 'e.Nombre as NombreEquipo', 'tipo.Nombre as TipoAccesorio', 'a.Codigo as CodigoAccesorio',
                 'd.NombreDepartamento', 'd.Direccion', 'm.Nombre as Marca', 'a.Serie', 'a.Modelo',
                 'tipo.EntradaSalida', 'a.Descripcion as DescripcionAccesorio', 'e.Nombre as NombreEquipo',
                 'a.Secuencial as SecuencialAccesorio')
        ->get();
        
        if($accesorios -> isEmpty()){
            $accesorios = null;
        }
        
        $tipo = DB::table('tipoaccesorio')
        ->select("Nombre", "Secuencial")
        ->get();

        $marcas = DB::table('marca')
        ->select("Nombre", "Secuencial")
        ->get();

        return view('livewire.datos-accesorios', compact('accesorios','tipo', 'marcas','equipo'));
    }

    
}
