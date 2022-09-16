<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/inventory/resources/css/principal.css">
    <title>Equipo</title>
</head>
<body>
    
    <div><livewire:header></livewire:header></div>
    <div class="pantalla">
        <div class="navegacion">
            <livewire:navbar secuencial='{{ $equipo -> Secuencial }}'></livewire:navbar>
        </div>
        <div class="equipo">
            @switch($nombre)
                @case('pantalla-equipo')
                    <livewire:pantalla-equipo auxiliar='{{$equipo -> Secuencial}}'></livewire:pantalla-equipo>
                @break
                
                @case('datos-equipo')
                    <livewire:datos-equipo auxiliar='{{$equipo -> Secuencial}}'></livewire:datos-equipo>
                @break

                @case('datos-accesorios')
                    <livewire:datos-accesorios auxiliar='{{$equipo -> Secuencial}}'></livewire:datos-accesorios>
                @break

                @case('software')
                    <livewire:datos-programas auxiliar='{{$equipo -> Secuencial}}'></livewire:datos-programas>
                @break

                @case('network')
                    <livewire:datos-network auxiliar='{{$equipo -> Secuencial}}'></livewire:datos-network>
                @break
            @endswitch
            
        </div>
    </div>
    
    
</body>

<footer>
    <x-footer></x-footer>
</footer>
</html>