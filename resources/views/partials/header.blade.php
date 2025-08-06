<div class="titulo fw-bold text-center">Deportes Asis</div>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid headerNav">
    <a class="navbar-brand" href="{{ route('showCategoria', ['categoria' => 'Balones'])}}"><img src="{{asset('storage').'/imagenes'.'/logo_asis_blanco.png'}}" alt="logo-asis" width="100"/></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
        <i class="fa fa-bars blanco" aria-hidden="true"></i>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Deportes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('showCategoria', ['categoria' => 'Artes Marciales'])}}">Artes Marciales</a></li>
            <li><a class="dropdown-item" href="{{ route('showCategoria', ['categoria' => 'Basquetbol'])}}">Basquetbol</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('showCategoria', ['categoria' => 'Futbol'])}}">Futbol</a></li>
            <li><a class="dropdown-item" href="#">Natación</a></li>
            <li><a class="dropdown-item" href="{{ route('showCategoria', ['categoria' => 'yoga-y-pilates'])}}">Yoga</a></li>
      
          </ul>
        </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gym
          </a>        
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('showCategoria', ['categoria' => 'pesas-y-mancuernas'])}}">Pesas y Mancuernas</a></li>
              <li><a class="dropdown-item" href="#">Discos</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Gimnasio</a></li>
              <li><a class="dropdown-item" href="#">Fitness</a></li>
              <li><a class="dropdown-item" href="#">Fuerza</a></li>
              <li><a class="dropdown-item" href="#">Entrenamiento</a></li>
              <li><a class="dropdown-item" href="{{ route('showCategoria',['categoria' => 'agilidad-y-coordinacion'])}}">Agilidad y coordinación</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Accesorios
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('showCategoria', ['categoria' => 'Balones'])}}">Balones</a></li>
            <li><a class="dropdown-item" href="#">Accesorios Deportivos</a></li>
            <li><a class="dropdown-item" href="#">Protección y cuidado</a></li>
      
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Otros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ver todo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contacto')}}">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('cuenta')}}">Cuenta</a>
        </li>
      </ul>


      <span style="margin-right:10px;">BUSQUEDA</span><form name="frm" action="{{route('productos-buscar')}}" method="POST">
                    {{ csrf_field() }}
                      <input type="hidden" name="accion" value="busqueda">
                      <input type="text" name="txtBuscar" id="txtBuscar">&nbsp;<button class="btn btn-default" type="submit"><i class="fa fa-search blanco"></i></button>
                      </form>
    </div>
  </div>
</nav>