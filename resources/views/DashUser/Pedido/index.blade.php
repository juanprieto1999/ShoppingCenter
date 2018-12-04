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


@foreach($pedido as $pe)
<div class="row">
<div class="card col-md-12">
  <div class="card-header">
    <p>Pedido N {{$pe->idVenta}} </p>  <p style="float: right;">{{ $pe->Fecha_Hora }}</p>
  </div>
  <div class="card-body">
   <div class="card-columns">
  	@foreach($articulos as $art)
  	@if($art->idVenta==$pe->idVenta)
	    <div class="card">
		    <div class="card-body">
			<img  style="float: right;" src="{{ asset('Imagenes/Empresa/'.$art->empresa.'/'.$art->Imagen) }}"  widht="100px" height="100px" alt="">
			<h5 class="card-title text-left" >{{ $art->Nombre }}</h5>
			<p class="card-text text-left">Cantidad: {{ $art->Cantidad }}</p>
			<p class="card-text text-left">Valor: {{ $art->Precio }}</p>
	    	</div>
	    	<div class="card-footer">
	    		<p>{{ $art->Estado }}</p>
	    	</div>
	  	</div> 
   @endif
	@endforeach
	 	</div>
	 </div>
  <div class="card-footer ">
  	 <a href="#" class="btn btn-primary float-right">Ver Pedido</a>
    Total: {{ $pe->Total_Venta }}
  </div>
</div>  
</div>
 @endforeach
           


@endsection	