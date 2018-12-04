@extends ('layouts.DashboardAdmin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado De Categorias<a href="{{action('categoriacontroller@create')}}"><button class="btn btn-succes">Nuevo</button></a></h3>
	{{-- @include('DashStore/Articulo/search')--}}
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Estado</th>
				</thead>
				@foreach ($categorias as $cat)
				<tr>
					<td>{{$cat->idCategoria}}</td>
					<td>{{$cat->Nombre}}</td>
					<td>{{$cat->Descripcion}}</td>
					<td>@if($cat->Condicion ==1)
						{{ 'Activo' }}
						@else
						{{ 'Desactivado' }}
						@endif
					</td>
				 	<td>
						<a href="{{URL::action('categoriacontroller@edit',$cat->idCategoria)}}"><button class="btn btn-info">Editar</button></a> 
						<a href="" data-toggle="modal" data-target="#modal-status-{{$cat->idCategoria}}" ><button class="btn btn-warning">Cambiar condicion
						</button></a>
					
							
					</td>

				</tr>
				 @include('DashAdmi.Categoria.modal')								
				@endforeach
			


			</table>	
		</div>

		</div>

	</div>
@endsection