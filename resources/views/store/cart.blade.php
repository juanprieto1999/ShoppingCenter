@extends('layouts.encabezado')
@section('content')
<head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">


	 <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
	 <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="{{ ('css/bootstrap.min.css')}}"/>
        <!-- Slick -->
        <link type="text/css" rel="stylesheet" href="{{  asset('css/slick.css')  }}"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }} "/>  
        <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }} "/>
         <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }} "/>
 
 </head>
<script src="{{asset('js/cart.js')}}">
</script>
<style >
	body{
		background-color: rgb(234, 234, 234);
        padding-top: 7%;
  }

	}
	h1{
		text-align: center;
	}
	
</style>
<body>
@if (count($errors))
		<div class="alert alert-danger">
			<ul>
				<li>{{$errors}}</li>
		
			</ul>
		</div>
@endif



@if(count($cart))
<div class="col-md-12 col-sm-12">
            <h1>Carrito de compras</h1>

<div class="table-cart">
	<p >
	<a href="{{ route('cart-trash') }}" class="btn btn-danger">
		Vaciar Carrito <i class="fa fa-trash"></i>
	</a>
</p>

<div class="table-responsive">
	<table class="table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th>Imagen</th>
				<th>Producto</th>
				<th>Valor Unitario</th>
				<th>Cantidad</th>
				<th>Total</th>
				<th>Eliminar de carrito</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($cart as $item)
			<tr>
				<td><img src="{{asset('Imagenes/Empresa/'.$item->Empresaart.'/'.$item->Imagen)}}" width="100" height="100"></td>
				<td>{{ $item->Nombre }}</td>
				<td>${{number_format($item->Valor,2) }}</td>
				<td>
					<input type="number" min="1" max="{{$item->Stock}}" value="{{$item->cantidad}}" 
					id="product_{{$item->idArticulo}}">
						<a class="btn btn-warning" href='javascript:;' onclick="actualizar(this);"
						data-href="{{route('cart-update',$item->idArticulo)}}" 
						data-id="{{$item->idArticulo}}">
							<i class="fa fa-refresh"></i>
						</a>
				</td>
				<td>${{number_format($item->Valor * $item->cantidad,2) }}
				</td>
				<td>
					<a href="{{ route('cart-delete',$item->idArticulo) }}" class="btn btn-danger">
						<i class="fa fa-remove"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</div>

@else
{{--<h2><span class="lablel label-warning">Aqui no hay nada :(</span></h2>--}}
<div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Shopping cart</h1>
            <div class="shopping-cart-page">
              <div class="shopping-cart-data clearfix">
                <p>Your shopping cart is empty!</p>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
@endif
<p>
	<a href="{{ url('/') }}" class="btn btn-primary">
		<i class="fa fa-chevron-circle-left">Seguir Comprando</i>
	</a>
	<a href="{{ route('order-detail') }}" class="btn btn-primary">
		<i class="fa fa-chevron-circle-right">Continuar</i>
	</a>


</p>
</div>
</div>

<!-- product -->
					<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Productos mas Populares</h3>
						</div>
					</div>

					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./Imagenes/bebida2.jpg" alt="">
								<div class="product-label">
									<span class="sale">-30%</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>
						</div>
					</div>
					<!-- /product -->

					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./img/product02.png" alt="">
								<div class="product-label">
									<span class="new">NEW</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>
						</div>
					</div>
					<!-- /product -->

					<div class="clearfix visible-sm visible-xs"></div>

					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							
							<div class="product-img">
								<img src="./img/product03.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>
						</div>
					</div>
					<!-- /product -->

					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./img/product04.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>
						</div>
					</div>
					<!-- /product -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		</body>
			<!-- /container -->
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

@endsection

