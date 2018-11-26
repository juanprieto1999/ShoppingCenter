@extends('layouts.encabezado')
@section('content')
<head>
        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
        <!-- Slick -->
        <link type="text/css" rel="stylesheet" href="{{  asset('css/slick.css')  }}"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }} "/>  
        <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }} "/>
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }} ">
        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }} "/>
        
</head>
<style type="text/css">
.imagentienda{
	position: relative;
	display: block;	
}
#nombretienda{
	position: absolute;
	bottom: 30%;
	margin-left: 40%;
    font-family: cursive;
    
	color:#FFFFFF;
    -webkit-text-stroke-width: 4px;
    -webkit-text-stroke-color: black;
}
@media  (min-width: 768px) {
	#nombretienda{
        font-size: 90px;   
                   }
               }

#imgempresa {
width: 100%;
height: 350px;
}
/*.item{

width: 250px;
height: 300px;
margin:3%;
float: left;
border-radius:10%;

}
.item img {
width: 100%;
height: 70%;
border-radius: 10%;


}
.products-tabs{
width: 100%;
height: 100px;
section h3{
	font-size:30px;
	font-family: cursive; 
}
section{
	text-align: center;
}

}*/
</style>

<body>


	<!--SECTION-->
	
	<!--ROW-->
  	<div class="row" >
        <div class="col-12">
               
		@foreach ($empresa as $empre)

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img  id="imgempresa" src="{{ asset('Imagenes/Empresa/'.$empre->Nombre.'/'.$empre->Imagen)}}" alt="{{$empre ->Nombre}}">
      	<div class="carousel-caption">
    		<h1>{{$empre ->Nombre}}</h1>
   			<p>{{$empre ->Descripcion}}</p>
  		</div>
    </div>
    </div>

 

  </div>





		{{-- <div class="imagentienda">
		<img src="{{ asset('Imagenes/Empresa/'.$empre->Nombre.'/'.$empre->Imagen)}}">
		<div id="nombretienda">{{$empre ->Nombre}}</div>
		</div> --}}
		@endforeach

		</div>
     </div>
    <!--ROW-->
   
    <!-- SECTION -->
  <!-- SECTION -->
        <div class="section">
             <!-- container -->
            <div class="container"> 
<div class="row">
	<div id="aside" class="col-md-3">
  <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Precio</h3>
                            <div class="price-filter">
                                <div id="price-slider"></div>
                                <div class="input-number price-min">
                                    <input id="price-min" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number price-max">
                                    <input id="price-max" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->
	</div>

				<div id="store" class="col-md-9">
                        <!-- store top filter -->
                    <div class="store-filter clearfix">
                            <div class="store-sort">
                                <label>
                                    Ordenar Por:
                                    <select class="input-select">
                                        <option value="0">Popular</option>
                                        <option value="1">Mas Barato</option>
                                    </select>
                                </label>

                                <label>
                                    Ver:
                                    <select class="input-select">
                                        <option value="0">20</option>
                                        <option value="1">50</option>
                                    </select>
                                </label>
                            </div>
                            <ul class="store-grid">
                                <li class="active"><i class="fa fa-th"></i></li>
                                <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                     </div>    
					<div class="row">
  						 <!--product -->
                        @foreach ($articulos as $art)

                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset('Imagenes/Empresa/'.$art->empresa.'/'.$art->Imagen)}}" alt=""  height="200px">
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">NUEVO</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                       
                                        <h3 class="product-name"><a href="#">{{$art->Nombre}}</a></h3>
                                        {{-- <p class="product-category">{{$art->categoria}}</p> --}} 
                                        <h4 class="product-price">${{$art->Valor}} <del class="product-old-price">$990.00</del></h4>
                                       
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">FAVORITO</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">COMPARAR</span></button>
                                            <a href="{{route('articulo-detail',$articulo->id)}}><button><i class="fa fa-eye"></i>DETALLES</button></a>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="{{ route('cart-add',$art->idArticulo) }}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>AÑADIR +</button></a>
                                    </div>
                                </div>
                            </div>
                          <div class="clearfix visible-lg visible-md"></div>
                           @endforeach

                            <!-- /product -->
                      
                   </div>
                     <!-- store bottom filter -->
                        <div class="store-filter clearfix">
                            <span class="store-qty">Showing 20-100 products</span>
                            <ul class="store-pagination">
                                {{$articulos->render()}}
                            </ul>
                        </div>
                        <!-- /store bottom filter -->
                </div>
</div>
</div>
</div>
               </body>
        
{{-- <a>
<img src="{{asset('Imagenes/Empresa/'.$art->empresa.'/'.$art->Imagen)}}"   >
</a>
<section>
<h3>{{$art->Nombre}}</h3>
<p> valor : $ {{$art->Valor}} </p>
<button>Agregar</button>
<button>Detalles</button>
</section> --}}


<script src="{{ asset('js/Store/jquery.min.js') }}"></script>
        <script src="{{ asset('js/Store/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/Store/slick.min.js') }}"></script>
        <script src="{{ asset('js/Store/nouislider.min.js') }}"></script>
        <script src="{{ asset('js/Store/jquery.zoom.min.js') }}"></script>
        <script src="{{ asset('js/Store/main.js') }}"></script>

@endsection
      