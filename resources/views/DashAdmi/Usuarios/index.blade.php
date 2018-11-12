@extends ('layouts.DashboardAdmin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
		<h3>Listado De Usuarios</h3>
		{{--  @include('Tiendas.search')--}}
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Usuario</th>
					<th>Email</th>
					<th>IdPersona</th>
					<th>IdEmpresa</th>
					<th>Estado</th>
				</thead>
				@foreach ($listausuarios as $us)
				<tr>
					<td>{{$us->id}}</td>
					<td>{{$us->name}}</td>
					<td>{{$us->email}}</td>
					<td>{{$us->idpersona}}</td>
					<td>{{$us->idempresa}}</td>
					<td>@if($us->estado==1)
						{{ 'Activo' }}
						@else
						{{ 'Desactivado' }}
						@endif

					</td>					
				<td>
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-delete-{{$us->id}}">Cambiar Estado</button> 
					
				</td>
				</tr>
			 @include('DashAdmi.Usuarios.modal') 
				@endforeach
			</table>


		</div>
 {{--$listatiendas->render()--}}
	</div>
	</div>
	

	@endsection