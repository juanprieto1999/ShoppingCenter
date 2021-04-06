@extends('layouts.encabezado')
@section('content')
<head>
        <!-- Bootstrap Y ajax en encabezado.blade.php-->
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
       
        <style>
            html, body {
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
               }
             

               @media (min-width:768px){
              .carousel-inner img {
                 height: 500px;   
              }
               }
           .carousel-inner img {
              width: 100%;              
              filter:brightness(0.7);
              }

            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 15vh;
                -webkit-text-stroke-width: 2px;
                -webkit-text-stroke-color: black;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 14px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
           
            #color{
              color: rgba(0, 0, 0, 0.67);
            }            
        </style>
    </head>
    <body>
      <!--Mensaje compea realizada-->
      @if(\Session::has('message'))
          @include('store.partials.message')
      @endif
      <!---->
      <section>
        <div id="demo" class="carousel slide" data-ride="carousel">
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
          </ul>
          <div class="carousel-inner">
            <div class="carousel-item active">
           <img src="{{ asset('Imagenes/imgnueva.jpg') }}" alt="moda" >
              <div class="carousel-caption">
                <div class="flex-center position-ref full-height">
                    <div class="content">
                        <div class="title m-b-md">
                            Shopping Center
                        </div>
                        

                        <div class="links">
                            <a href='javascript:;' onclick="listProduct();" data-toggle="modal" data-target="#modal-listatiendas" >Tiendas</a>
                            <a href="https://laravel-news.com">Lo mas vendido!</a>
                            <a href="https://nova.laravel.com">Promociones</a>
                        </div>                     
                    </div>

                </div>
              </div>   
            </div>

    <div class="carousel-item">
      <img src="{{ asset('Imagenes/tecnologia.jpg') }}" alt="moda" >
      <div class="carousel-caption">
          <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Tecnologia
                </div>
                <div class="links">
                    <a href="https://laravel.com/docs">Tiendas</a>
                    <a href="https://laracasts.com">Productos</a>
                    <a href="https://laravel-news.com">Lo mas vendido!</a>
                    <a href="https://nova.laravel.com">Promociones</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
      </div>   
    </div>
    <div class="carousel-item" id="informacion2">
      <img src="{{ asset('Imagenes/comida1.jpg') }}" alt="Bebidas">
      <div class="carousel-caption">
         <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Comidas
                </div>
                <div class="links">
                    <a href="https://laravel.com/docs">Tiendas</a>
                    <a href="https://laracasts.com">Productos</a>
                    <a href="https://laravel-news.com">Lo mas vendido!</a>
                    <a href="https://nova.laravel.com">Promociones</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="{{ asset('Imagenes/tienda2.jpg') }}" alt="moda" >
      <div class="carousel-caption">
          <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Moda y Estilo
                </div>
                

                <div class="links">
                    <a href="https://laravel.com/docs">Tiendas</a>
                    <a href="https://laracasts.com">Productos</a>
                    <a href="https://laravel-news.com">Lo mas vendido!</a>
                </div>
            </div>
        </div>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
   @include('Inicio.modalist')
</div> 
</section>
@include('layouts/footer')
  <script>   
var listProduct = function()
  {
      $.ajax({
          type:'get',
          url:'{{ url('/liststores')}}',
          success: function(data){
              $('#lista-tiendas').empty().html(data);
          }
      });
  }
 </script>
    </body>
@endsection