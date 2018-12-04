@extends ('layouts.DashBoardUser')
@section ('contenido')
<style type="text/css">
	.box{
background-color: white;
	}
	.card-header p {
		display:inline-block; 
	}
</style>

<div class="row">
	
@foreach($pedido as $pe)
<div class="card col-md-12">
  <div class="card-header">
    <p>Pedido N {{$pe->idVenta}} </p>  <p style="float: right;">{{ $pe->Fecha_Hora }}</p>
  </div>
  <div class="card-body">
	    <div class="card">
	    <div class="card-body">

		<img  style="float: right;" src="{{ asset('Imagenes/t4.jpg') }}"  widht="100px" height="100px" alt="">
		<h5 class="card-title text-left" >Producto</h5>
		<p class="card-text text-left">Valor</p>
		<p class="card-text text-left" >Estado</p>
	    </div>
	  	</div> 
  </div>
  <div class="card-footer ">
  	 <a href="#" class="btn btn-primary float-right">Ver Pedido</a>
    Total: {{ $pe->Total_Venta }}
  </div>
</div>
@endforeach







     

 </div>
           


@endsection	