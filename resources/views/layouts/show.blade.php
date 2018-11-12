@extends('layouts.app')
@section('title','Articulo')

@section('content')

<img style="height: 200px; width: 200px;background-color: #EFEFEF;margin: 20px;"class-img-toprounded-circle mxauto d-block"  src="/Imagenes/{{$articulo->Imagen}}" alt="">
<div class="card-title">{{$articulo->Nombre}}</div>

@endsection