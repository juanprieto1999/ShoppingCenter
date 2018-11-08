@extends ('layouts.DashboardAdmin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado De Tiendas</h3>
		{{--  @include('Tiendas.search')--}}
	</div>
</div>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Descripcion</th>
					<th>Nit</th>
					<th>Estado</th>
				</thead>
				@foreach ($listatiendas as $tiend)
				<tr>
					<td>{{$tiend->idEmpresa}}</td>
					<td>{{$tiend->Nombre}}</td>
					<td>{{$tiend->Direccion}}</td>
					<td>{{$tiend->Descripcion}}</td>
					<td>{{$tiend->Nit}}</td>					
					<td>@if($tiend->Estado ==1)
						{{ 'En Servicio' }}
						@else
						{{ 'Fuera De Servicio' }}
						@endif
					</td>
				<td>
					<a href="{{URL('/store/'.$tiend->idEmpresa)}}"><button class="btn btn-info">Ver</button>					
					<a href="#" data-target="#modal-delete-{{$tiend->idEmpresa}}" data-toggle="modal"><button class="btn btn-secondary">Cambiar Estado</button> 
					
				</td>
				</tr>
			@include('DashAdmi.Tiendas.modal')
				@endforeach
			</table>


		</div>
 {{--$listatiendas->render()--}}
	</div>
	</div>
	

	@endsection