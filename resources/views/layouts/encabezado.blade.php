<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/encabezado.css') }}">
  {{-- <  <link rel="stylesheet" href="{{ asset('css/iniciog.css') }}"> --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <script type="text/javascript">
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
</script>

      <nav class="navbar fixed-top navbar-expand-lg navbar-light ">

     <div id="titulo"  >
     <!-- <h1>ShoppingCenter</h1>-->
<a href="/"><img src="{{  asset('Imagenes/Logo.png')  }}" width="45%" align="left"></a>

    </div>

<ul class="navbar-nav flex-row w-100 justify-content-end">
  @guest
    <li class="nav-item px-2">
      <a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a>
    </li>
      <li class="nav-item px-2">
      <a class="nav-link" href="{{ route('register') }}">Registro</a>
    </li>
  @else

    <li class="nav-item px-2">
      <label class="nav-label"> Bienvenido {{ Auth::user()->name }}</label>
    </li>
    <li class="nav-item px-2">
      <a href="{{ route('logout') }}"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>

    </li>
  @endguest




</ul>
      </nav>


    @yield('content')

  </body>
</html>
