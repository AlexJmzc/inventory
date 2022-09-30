<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HGPT REPORTES</title>
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet">

</head>
<body>
    

<div class="row d-flex justify-content-center align-items-center" style="width:100%;">

    <div class="col-md-10">

        <div class="mt-2 table-responsive-md">
            <table id="mytable" class="table display table-hover">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Cédula</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Nombre Computador</th>
                        <th scope="col">Dirección IP</th>
                    </tr>
                </thead>
                <tbody id="equipos">
                    @foreach ($equipos as $equipo)
                    <tr>
                        <td>{{ $equipo->Codigo }}</td>
                        <td>{{ $equipo->Cedula }}</td>
                        <td>{{ $equipo->NombreCompleto }}</td>
                        <td>{{ $equipo->NombreDepartamento }}</td>       
                        <td>{{ $equipo->Nombre }}</td>
                        <td>{{ $equipo->DireccionIP }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>

 
            </div>
        </div>



    </div>

</div>


</body>
</html>
