<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1.0, minimun-scale=1.0">
    <title>Shopping Center - DEVELOP</title>
    <link rel="stylesheet" href="{{ asset('css/encabezado.css') }}">
    <!--AJAX-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js" type="text/javascript"></script>
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--FONDOS-->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  </head>

  <body >
{{-- <script type="text/javascript">
     $(document).ready(function() {
  $('#titulo').hide(0);


    $(window).scroll(function(){
        var windowHeight = $(window).scrollTop();
        var contenido2 = $("#informacion2").offset();
        contenido2 = contenido2.top;

            if(windowHeight >= contenido2  ){
          $('#titulo').fadeIn(500);

            }else{
          $('#titulo').fadeOut(500);
        }
                   });
                });

function medidas(id){
    return {w:document.getElementById(id).offsetWidth,h:document.getElementById(id).offsetHeight}
}
</script>--}}
  <header>
  <nav  class="navbar fixed-top navbar-expand-lg navbar-light  ">
      <div id="titulo"  >         
        <a href="/"><img src="{{asset('Imagenes/Logo.png')}}" width="45%" align="left"></a>
      </div>

      {!! Form::open(array('url'=>'/serch','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
      <div  class="form-group" id="buscar">
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
        <a href="{{ route('dashuser') }}"><i class="fa fa-user d-sm-block d-md-none nav-mov-2 "   style="margin-top: 10px; font-size: 20px;"></i>
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
@yield('content')
<script type="text/javascript">
      $(window).scroll(function() {
        if ($("#menu").offset().top > 100) {
            $("#menu").addClass("bg-dark");
        } else {
            $("#menu").removeClass("bg-dark");
        }
      });
</script>
  </body>
  
</html>
