<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<nav class="navbar navbar-light p-2 text-dark bg-opacity-25 shadow p-3 mb-5" style="background: rgb(240, 235, 235);">
  <div class="container">
    <div class="d-flex align-items-center">
    <a class="navbar-brand align-middle" href="#">
      <img src="http://localhost/inventory/resources/imagenes/LogoHGPT1.png" height="65" alt="HGPT Logo" loading="lazy" class="d-inline-block align-text-top me-2" />
    </a>
    <h5 class="" style="text-align: center;"> HONORABLE GOBIERNO <br> PROVINCIAL DE TUNGURAHUA</h5>

    </div>


    <div class="d-flex">
      <a href="{{route('equipos.index')}}" class="me-2" href="#" style="text-decoration: none;color:black">Inicio</a>
    </div>
    <div class="d-flex">
      <a href="{{route('keycloak.logout')}}" class="me-2" href="#" style="text-decoration: none;color:black">Cerrar Sesion</a>
    </div>
  </div>
</nav>