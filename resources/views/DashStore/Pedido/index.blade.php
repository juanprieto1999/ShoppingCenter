@extends ('layouts.DashboardStore')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado De Pedidos{{-- <a href="{{action('articulocontroller@create')}}"><button class="btn btn-succes">Nuevo</button>--}}</h3>
	{{--@include('DashStore/Articulo/search')--}}
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>IdPedido</th>
					<th>Fecha</th>
					<th>Usuario</th>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Valor</th>
					<th>Estado</th>
				</thead>
				@foreach ($lista as $sale)
				<tr>
					<td>{{$sale->idDetalleVenta}}</td>
					<td></td>
					<td>{{$sale->username}}</td>
					<td>{{ $sale->idArticulo }}</td>
					<td>{{$sale->Cantidad}}</td>
					<td>{{$sale->Precio}}</td>
					<td>{{$sale->Estado}}
					</td>
				 	<td>
				 		@if($sale->Estado=='Pendiente')
				 		<a href="{{route('sale.statussale', [$sale->idDetalleVenta,'Confirmado'])}}"><button class="btn btn-success"> Confirmar Pedido</button></a>
						<a href="" data-toggle="modal" data-target="#modal-status-{{$sale->idDetalleVenta}}" ><button class="btn btn-danger">
							Cancelar Pedido
						</button></a>
						@elseif($sale->Estado=='Confirmado')
						<a href="{{route('sale.statussale', [$sale->idDetalleVenta,'Enviado'])}}"><button class="btn btn-success">Pedido Enviado</button></a>
						<a href="" data-toggle="modal" data-target="#modal-status-{{$sale->idDetalleVenta}}" ><button class="btn btn-danger">
							Cancelar Pedido
						</button></a>
						@elseif($sale->Estado=='Enviado')
						<a href="{{route('sale.statussale', [$sale->idDetalleVenta,'Entregado'])}}"><button class="btn btn-success">Pedido Entregado</button></a>
						@elseif($sale->Estado=='Entregado')
						<a href="{{route('sale.statussale', [$sale->idDetalleVenta,'Finalizado'])}}"><button class="btn btn-success">Finalizar</button></a>
						@endif 			
							 
					</td> 

				</tr>
				@include('DashStore.Pedido.modal') 
						
				@endforeach
			


			</table>	
		</div>

		</div>

	</div>

@endsection