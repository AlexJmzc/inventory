
@extends('layouts.app')

@section('content')

<div class="row d-flex justify-content-center d-flex align-items-center" style="width:100%;" >
    <div class="col-md-8">
        <div class="mt-2 table-responsive-md">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Departamento</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Nombre Computador</th>
                    <th scope="col">Dirección IP</th>
                    <th scope="col">Acción</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($equipos as $equipo)
                        <tr>
                            
                            <td>{{ $equipo->NombreDepartamento }}</td>
                            <td>{{ $equipo->NombreCompleto }}</td>   
                            <td>{{ $equipo->Nombre }}</td>   
                            <td>{{ $equipo->DireccionIP }}</td>   


                            <td>
                            <a href="{{ route('equipos.show', $equipo->Secuencial) }}" style="text-decoration:none; color:black" >  
                            <button name="name" type="submit" class="btn btn-warning">
                                   Mostrar                                
                            </button>
                                </a>    
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<x-footer></x-footer>

@endsection