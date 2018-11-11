@extends ('layouts.DashboardStore')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado De Articulos<a href="{{action('articulocontroller@create')}}"><button class="btn btn-succes">Nuevo</button></a></h3>
	@include('DashStore/Articulo/search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Codigo</th>
					<th>Categoria</th>
					<th>Descripcion</th>
					<th>Stock</th>
					<th>Valor</th>
					<th>Estado</th>
				</thead>
				@foreach ($articulos as $art)
				<tr>
					<td>{{$art->idArticulo}}</td>
					<td>{{$art->Nombre}}</td>
					<td>{{$art->Codigo}}</td>
					<td>{{$art->categoria}}</td>
					<td>{{$art->Descripcion}}</td>
					<td>{{$art->Stock}}</td>
					<td>{{$art->Valor}}</td>
						{{--<img src="{{asset('imagenes/articulos/'.$art->Imagen)}}" alt="{{$art->Nombre}}" height="100px" width="100px" class="img-thumbnail">--}}
					<td>@if($art->Estado ==1)
						{{ 'Activo' }}
						@else
						{{ 'Desactivado' }}
						@endif
					</td>
				 	<td>
						 <a href="{{URL::action('articulocontroller@edit',$art->idArticulo)}}"><button class="btn btn-info">Editar</button></a> 
						<a href="" data-toggle="modal" data-target="#modal-status-{{$art->idArticulo}}" ><button class="btn btn-warning">Cambiar Estado
							
						</button></a>
						<a href="" data-toggle="modal" data-target="#modal-delete-{{$art->idArticulo}}" ><button class="btn btn-danger">
							Eliminar
							
						</button></a>
							
					</td>

				</tr>
				@include('DashStore.Articulo.modal')										
				@endforeach
			


			</table>	
		</div>

		</div>

	</div>
@endsection