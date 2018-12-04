@extends ('layouts.DashboardAdmin')
@section ('contenido')

<div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nueva categoria</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
			</ul>
		</div>
		@endif
		{!!Form::open(array('url'=>'dashadmin/categorias','method'=>'POST','autocomplete'=>'off' ))!!}
		{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<label for="Nombre">Nombre</label>
				<input type="text" name="Nombre" required value="{{old('Nombre')}}" class="form-control" placeholder="Nombre...">
			</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<label for="Descripcion">Descripcion</label>
				<input type="text" name="Descripcion"  value="{{old('Descripcion')}}" class="form-control" placeholder="Descripcion Del categoria...">
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


</div>

@endsection