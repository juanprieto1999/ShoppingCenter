@extends('layouts.encabezado')
@section('content')

<H1>Detalle de Producto</H1>

<div class="product-block">
	<img  src="{{ asset('Imagenes/Empresa/'.$empresa->Nombre.'/'.$articulo->Imagen)}}" alt="{{$articulo ->Nombre}}" width="300">  
</div>
<div class="product-block">
	<p>{{($articulo->Nombre)}}</p>
</div>
@endsection