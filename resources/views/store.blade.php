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
/*.items{
margin: 2%; 
width:95%;
height: 800px;
background-image:url('../Imagenes/imgnueva.jpg');
background-size: 100%;
background-attachment: fixed;

}*/
.item{
border-style: solid;
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
<p> {{$art->Valor}} </p>
<button>Add</button>
</section>
</div>
@endforeach

 {{$articulos->render()}}
</div>



@endsection

</body>