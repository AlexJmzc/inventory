@extends('layouts.app')




@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="d-flex align-items-center flex-column mb-3" style="margin-left: 51%;">
    <a href="{{ route('equipos.create') }}">
        <button class="btn btn-success">Añadir</button>
    </a>
</div>

<div class="row d-flex justify-content-center d-flex align-items-center" style="width:100%;">
    <div class="col-md-8">
        <div class="mt-2 table-responsive-md">
            <table id="mytable" class="table table-striped display">
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
                            <a href="{{ route('equipos.show', $equipo->Secuencial) }}" style="text-decoration:none; color:black">
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
@endsection

<x-footer></x-footer>


