@extends('layouts.encabezado')
@section('content')
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
    font-weight: 200;
    font-size: 80px;
	color:#FFFFFF;
	text-align: center;
    -webkit-text-stroke-width: 4px;
    -webkit-text-stroke-color: black;
}

.imagentienda   img {
width: 100%;
height: 350px;
}

.item{

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
section h3{
	font-size:30px;
	font-family: cursive; 
}
section{
	text-align: center;
}

}
</style>

<body>
@foreach ($empresa as $empre)
<div class="imagentienda">
<img src="{{ asset('Imagenes/Empresa/'.$empre->Nombre.'/'.$empre->Imagen)}}" >
<div id="nombretienda">{{$empre ->Nombre}}</div>
</div>
@endforeach
<div class="items">
<HEADER>
@foreach ($articulos as $art)
<div class="item">

<a>
<img src="{{asset('Imagenes/Empresa/'.$art->empresa.'/'.$art->Imagen)}}"   >
</a>
<section>
<h3>{{$art->Nombre}}</h3>
<p> valor : $ {{$art->Valor}} </p>
<button>Agregar</button>
<button>Detalles</button>
</section>
</div>
@endforeach

 {{$articulos->render()}}
</div>



@endsection

</body>