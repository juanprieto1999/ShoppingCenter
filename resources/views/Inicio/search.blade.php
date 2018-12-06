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
<style >
.products-tabs{
width: 100%;
height: 100px;

}
body{
      padding-top: 7%;
}

</style>

<body>
    <div class="section">
<div class="container">
  <div class="row" >
                    <div class="col-md-12">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab2" class="tab-pane fade in active">
                                    <div class="products-slick" data-nav="#slick-nav-2">
                                    @foreach ($articulos as $art)
                                    @if($condicion != $art->idEmpresa)                           
                                        <!-- product -->
                                        <div class="product">
                                            {{-- <div class="product-img">
                                                <img src="{{ asset('Imagenes/Empresa/'.$art->nempresa.'/'.$art->iempresa) }}" alt="" img>                                                                      
                                            </div>--}}
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="{{url('store/'.$art->idEmpresa)}}">{{$art->nempresa}}</a></h3>
                                                   <p class="product-category"></p>                                            
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                        
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        @php
                                            $condicion=$art->idEmpresa
                                        @endphp
                                    @endif

                                     @endforeach                                      
                                    </div>
                                    <div id="slick-nav-2" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->
                            </div>
                            </div>
                </div>
            </div>
        </div>
{{--
 --        <!-- SECTION -->
        <div class="section">
                  <!-- container -->
            <div class="container">      
                <!-- row -->
                <div class="row">
                    <!-- ASIDE -->
                    <div id="aside" class="col-md-3">
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Categories</h3>
                            <div class="checkbox-filter">

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-1">
                                    <label for="category-1">
                                        <span></span>
                                        Laptops
                                        <small>(120)</small>
                                    </label>
                                </div>

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-2">
                                    <label for="category-2">
                                        <span></span>
                                        Smartphones
                                        <small>(740)</small>
                                    </label>
                                </div>

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-3">
                                    <label for="category-3">
                                        <span></span>
                                        Cameras
                                        <small>(1450)</small>
                                    </label>
                                </div>

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-4">
                                    <label for="category-4">
                                        <span></span>
                                        Accessories
                                        <small>(578)</small>
                                    </label>
                                </div>

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-5">
                                    <label for="category-5">
                                        <span></span>
                                        Laptops
                                        <small>(120)</small>
                                    </label>
                                </div>

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-6">
                                    <label for="category-6">
                                        <span></span>
                                        Smartphones
                                        <small>(740)</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Price</h3>
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
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Brand</h3>
                            <div class="checkbox-filter">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-1">
                                    <label for="brand-1">
                                        <span></span>
                                        SAMSUNG
                                        <small>(578)</small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-2">
                                    <label for="brand-2">
                                        <span></span>
                                        LG
                                        <small>(125)</small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-3">
                                    <label for="brand-3">
                                        <span></span>
                                        SONY
                                        <small>(755)</small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-4">
                                    <label for="brand-4">
                                        <span></span>
                                        SAMSUNG
                                        <small>(578)</small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-5">
                                    <label for="brand-5">
                                        <span></span>
                                        LG
                                        <small>(125)</small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-6">
                                    <label for="brand-6">
                                        <span></span>
                                        SONY
                                        <small>(755)</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->

                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Top selling</h3>
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product01.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>

                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product02.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>

                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product03.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->
                    </div>
                    <!-- /ASIDE -->-

                    <!-- STORE -->
                    <div id="store" class="col-md-9">
                        <!-- store top filter -->
                        <div class="store-filter clearfix">
                            <div class="store-sort">
                                <label>
                                    Sort By:
                                    <select class="input-select">
                                        <option value="0">Popular</option>
                                        <option value="1">Position</option>
                                    </select>
                                </label>

                                <label>
                                    Show:
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
                        <!-- /store top filter -->
--}}
                        <!-- store products -->
                        <div class="container">
                        <div class="row">
                            <!-- product -->
                        @foreach ($articulos as $art)

                            <div class="col-md-3 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset('Imagenes/Empresa/'.$art->nempresa.'/'.$art->Imagen)}}" alt=""  height="200px">
                                       <!-- <div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">NEW</span>
                                        </div>-->
                                         @if($art->isNew == 1)
                                            <span class="new">NUEVO</span>
                                         @endif
                                    </div>
                                    <div class="product-body">
                                       
                                        <h3 class="product-name"><a href="#">{{$art->Nombre}}</a></h3>
                                         <p class="product-category">{{$art->categoria}}</p>
                                        <h4 class="product-price">${{$art->Valor}} <del class="product-old-price">$990.00</del></h4>
                                         <p class="product-category">{{$art->nempresa}}</p>
                                        <!--<div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>-->
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                           <button class="quick-view"> <a href="{{ route('articulo-detail',$art->idArticulo) }}"><i class="fa fa-eye"></i><span class="tooltipp">DETALLES</span></button></a>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="{{ route('cart-add',$art->idArticulo) }}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                                    </div>
                                </div>
                            </div>
                                <div class="clearfix visible-lg visible-md"></div>
                            @endforeach

                            <!-- /product -->
                           
                        </div>
                        <!-- /store products -->

                        <!-- store bottom filter -->
                        <div class="store-filter clearfix">
                            <span class="store-qty">Showing 20-100 products</span>
                            <ul class="store-pagination">
                                {{$articulos->render()}}
                                
                            </ul>
                        </div>
                        <!-- /store bottom filter -->
                    </div>
                    <!-- /STORE -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        @include('layouts/footer')
    </body>


        <!-- /SECTION -->
        <!-- jQuery Plugins -->
        <script src="{{ asset('js/Store/jquery.min.js') }}"></script>
        <script src="{{ asset('js/Store/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/Store/slick.min.js') }}"></script>
        <script src="{{ asset('js/Store/nouislider.min.js') }}"></script>
        <script src="{{ asset('js/Store/jquery.zoom.min.js') }}"></script>
        <script src="{{ asset('js/Store/main.js') }}"></script>




@endsection