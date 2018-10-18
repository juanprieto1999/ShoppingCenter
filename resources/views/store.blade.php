@extends('layouts.encabezado')
@section('content')
<style type="text/css">

.imagentienda{
	position: relative;
	display: block;	
}
#nombretienda{
	position: absolute;
	bottom: 50%;
	margin-left: 45%;
	text-align: center;
font-family: 'Nunito', sans-serif;
     font-weight: 200;
     font-size: 50px;
}
.imagentienda   img {
width: 100%;
height: 300px;
}
.items{
margin: 2%; 
width:95%;
height: 800px;
border-style: solid;
}
.item{
	border-style: solid;
width: 250px;
height: 300px;
margin:2%;
float: left;
}
.item img {
width: 100%;
height: 70%;

}


}
</style>
@foreach ($empresa as $empre)
<div class="imagentienda">
<img src="{{ asset('Imagenes/Empresa/'.$empre->Nombre.'/'.$empre->Imagen)}}" >
<div id="nombretienda">{{$empre ->Nombre}}</div>
</div>
@endforeach
<div class="items">

@foreach ($articulos as $art)
<div class="item">
<a>
<img src="{{asset('Imagenes/Empresa/'.$art->empresa.'/'.$art->Imagen)}}"   >
</a>
<section>
<h3>{{$art->Nombre}}</h3>
<p> {{$art->Valor}} </p>
<button>Add</button>
</section>
</div>
@endforeach

 {{$articulos->render()}}
</div>



@endsection