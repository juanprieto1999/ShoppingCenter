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
				 {{-- 	<td>
						 <a href="{{URL::action('articulocontroller@edit',$art->idArticulo)}}"><button class="btn btn-info">Editar</button></a> 
						<a href="" data-toggle="modal" data-target="#modal-status-{{$art->idArticulo}}" ><button class="btn btn-warning">Cambiar Estado
							
						</button></a>
						<a href="" data-toggle="modal" data-target="#modal-delete-{{$art->idArticulo}}" ><button class="btn btn-danger">
							Eliminar
							
						</button></a>
							
					</td> --}}

				</tr>
				{{-- @include('DashStore.Articulo.modal')	 --}}									
				@endforeach
			


			</table>	
		</div>

		</div>

	</div>

@endsection