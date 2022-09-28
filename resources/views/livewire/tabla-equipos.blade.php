
@extends('layouts.app')
<script src="http://code.jquery.com/jquery-1.9.0rc1.js"></script>
<script src="http://localhost/inventory/resources/js/pagination.js"></script>

<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<a href="{{ route('equipos.pdf')}}" style="text-decoration:none; color:black">
                                <button name="name" type="submit" class="btn btn-warning">
                                    PDF
                                </button>
                            </a>



<div class="row d-flex justify-content-center align-items-center" style="width:100%;">

    <div class="col-md-10">

        <div class="mt-2 table-responsive-md">
            <table id="mytable" class="table dataTables display table-hover">
                <thead>
                    <tr>
                        <th scope="col">Departamento</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Nombre Computador</th>
                        <th scope="col">Dirección IP</th>
                        <th scope="col">Acción</th>

                    </tr>
                </thead>
                <tbody id="equipos">
                    @foreach ($equipos as $equipo)
                    <tr>

                        <td>{{ $equipo->NombreDepartamento }}</td>
                        <td>{{ $equipo->NombreCompleto }}</td>
                        <td>{{ $equipo->Nombre }}</td>
                        <td>{{ $equipo->DireccionIP }}</td>


                        <td>
                            
                            <a href="{{ route('equipos.show', ['equipo'=>$equipo -> Secuencial,'aux'=>$equipo->Secuencial,'name'=>'pantalla-equipo']) }}" style="text-decoration:none; color:black">
                                <button name="name" type="submit" class="btn btn-warning">
                                    Mostrar
                                </button>
                            </a>
                            <!-- <button wire:click="equipos.show({{ $equipo -> Secuencial }}, 'test')">
                            Add Todo
                            </button>-->
                        </td>

                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="5">
                        <div class="d-flex  justify-content-end me-4 ">
                        <a href="{{ route('equipos.create') }}">
                            <button class="btn btn-success">Añadir</button>
                        </a>
                    </div>
                        </td>

                    </tr>

                </tfoot>

            </table>
            <div>

            </div>
        </div>



    </div>

</div>


@endsection
