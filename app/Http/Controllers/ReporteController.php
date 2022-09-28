<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;


class ReporteController extends Controller
{
    //
    public function index()
    {
        // $equipos = DB::table('equipos as e')
        // ->join('responsable as r', 'e.CedulaResponsable', '=', 'r.Cedula')
        // ->join('departamento as d', 'd.Secuencial', '=', 'r.SecuencialDepartamento')
        // ->orderby('d.NombreDepartamento', 'asc')
        // ->select('e.Secuencial', 'd.NombreDepartamento', DB::raw("CONCAT(r.PrimerNombre, ' ',r.ApellidoPaterno, ' ', r.ApellidoMaterno ) AS NombreCompleto"), 'e.Nombre', 'e.DireccionIP')
        // ->get();

        // $pdf = Pdf::loadView('reportes',[$equipos]);


        
        // return $pdf->stream();

    }
}
