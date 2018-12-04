@extends ('layouts.DashboardAdmin')
@section ('contenido')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Editar categoria: {{ $categoria->Nombre }}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
			</ul>
		</div>
		@endif



		{!!Form::model($categoria,['method'=>'PATCH','action'=>['categoriacontroller@update',$categoria->idCategoria],'files'=>'true'])!!}
		{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<label for="Nombre">Nombre</label>
				<input type="text" name="Nombre" required value="{{ $categoria->Nombre }}" class="form-control">
			</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<label for="Descripcion">Descripcion</label>
				<input type="text" name="Descripcion"  value="{{ $categoria->Descripcion }}" class="form-control" placeholder="Descripcion Del categoria...">
			</div>
		
		</div>
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<button class="btn btn-primary" type="submit">Guardar</button>
<button class="btn btn-danger" type="reset">Cancelar</button>
</div>
</div>

		{!!Form::close()!!}
</div>
	
@endsection