<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Menu</title>
	<link rel="stylesheet" href="{{ asset('css/encabezado.css') }}">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


{{-- 	<link rel="stylesheet" href="{{ asset('css/Pruebas/estilo.css') }}">
	<link rel="stylesheet" href="fonts.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script> --}}
{{-- 	<script src="{{ asset('js/Pruebas/main.js') }}"></script> --}}
</head>
<body>
<header>
		{{-- <div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
		</div>
		<nav>
			<ul>
				<li><a href="#"><span class="icon-house"></span>Inicio</a></li>
				<li><a href="#"><span class="icon-suitcase"></span>Trabajos</a></li>
				<li class="submenu">
					<a href="#"><span class="icon-rocket"></span>Proyectos<span class="caret icon-arrow-down6"></span></a>
					<ul class="children">
						<li><a href="#">SubElemento #1 <span class="icon-dot"></span></a></li>
						<li><a href="#">SubElemento #2 <span class="icon-dot"></span></a></li>
						<li><a href="#">SubElemento #3 <span class="icon-dot"></span></a></li>
					</ul>
				</li>
				<li><a href="#"><span class="icon-earth"></span>Servicios</a></li>
				<li><a href="#"><span class="icon-mail"></span>Contacto</a></li>
			</ul>
		</nav> --}}

 <nav  class="navbar fixed-top navbar-expand-lg navbar-light  ">
      <div id="titulo"  >         
        <a href="/"><img src="{{asset('Imagenes/Logo.png')}}" width="45%" align="left"></a>
      </div>

      {!! Form::open(array('url'=>'/serch','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
    	<div  class="form-group">
        <div id="buscador" class="input-group">
          <input type="search"  class="form-control mr-2" name="searchText" placeholder="Buscar.."> 
            <button type="submit" class="btn btn-primary">Buscar</button>	
        </div>
      </div>
      {!! Form::close() !!}

      <ul class="navbar-nav flex-row w-100 justify-content-end">
        <a href="{{ route('cart-show') }}"><i class="fa fa-shopping-cart nav-mov-1" style="margin-top: 10px; font-size: 20px;"></i>
        </a>
        @guest 
       	<a href="{{ route('login') }}"><i class="fa fa-user d-sm-block d-md-none nav-mov-2 "   style="margin-top: 10px; font-size: 20px;"></i>
        </a>
          <li class="nav-item px-2">
            <a class="nav-link"  style="color:white" href="{{ route('login') }}">Iniciar Sesion</a>
          </li>
           <li class="nav-item px-2">
            <a class="nav-link"  style="color:white" href="{{ url('/registro/user')}}">Registro</a>
          </li>
        @else
        <a href="{{ route('login') }}"><i class="fa fa-user nav-mov" style="margin-top: 10px; font-size: 20px;"></i>
        </a>
      	<li class="nav-item px-2">
            <label class="nav-label"> Bienvenido {{ Auth::user()->name }}</label>
          </li>
          <li class="nav-item px-2">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Cerrar Sesion') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

          </li>
        @endguest
          </ul>
  </nav>

		</header>	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>	
</html>
