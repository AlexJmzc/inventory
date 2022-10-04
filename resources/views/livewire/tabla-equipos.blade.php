<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="http://code.jquery.com/jquery-1.9.0rc1.js"></script>
        <script src="http://localhost/inventory/resources/js/pagination.js"></script>
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

        <title>Tabla Equipos</title>
    </head>

    <header>
        <livewire:header></livewire:header>
    </header>

    <body>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="container">
            <div class="row justify-content-end">
                <div class="col">
                    <a href="{{ route('equipos.pdf')}}" style="text-decoration:none; color:black">
                        <button name="name" type="submit" class="btn btn-danger" style="color:white;">
                            PDF
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center" style="width:100%;">
            <div class="col-md-10">
                <div class="mt-2 table-responsive-md">
                    <table id="mytable" class="table dataTables display table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Departamento</th>
                                <th scope="col">Nombre Computador</th>
                                <th scope="col">Dirección IP</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody id="equipos">
                            @foreach ($equipos as $equipo)
                            <tr>
                                <td>{{ $equipo->CodigoResponsable }}</td>
                                <td>{{ $equipo->CedulaResponsable }}</td>
                                <td>{{ $equipo->NombreCompleto }}</td>
                                <td>{{ $equipo->NombreDepartamento }}</td>
                                <td>{{ $equipo->Nombre }}</td>
                                <td>{{ $equipo->DireccionIP }}</td>
                                <td>
                                    <a href="{{ route('equipos.show', ['equipo'=>$equipo -> Secuencial,'aux'=>$equipo->Secuencial,'name'=>'pantalla-equipo']) }}" style="text-decoration:none; color:black">
                                        <button name="name" type="submit" class="btn btn-warning">
                                            Mostrar
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <div class="d-flex  justify-content-end me-4 ">
                                    <a href="{{ route('equipos.create') }}">
                                        <button class="btn btn-success">Añadir</button>
                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <footer style="margin-top:100px">
        <x-footer></x-footer>
    </footer>
</html>