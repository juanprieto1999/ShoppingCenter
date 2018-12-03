@extends ('layouts.DashboardUser')
@section ('contenido')
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	Configuracion De La Cuenta
	@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
			</ul>
		</div>
		@endif
{!!Form::model($User,['method'=>'PATCH','route'=>['user.update',$User->id]])!!}

		{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<label for="Usuario">Usuario</label>
				<input type="text" name="name" required value="{{ $User->name }}" class="form-control">
			</div>
		
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<label for="email">Email</label>
				<input type="text" name="email"  value="{{ $User->email }}" class="form-control">
				</div>
		{{-- 	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<label for="Direccion">Direccion</label>
				<input type="text" name="Direccion" required value="{{ $datos->direccion }}" class="form-control">
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<label for="Telefono">Telefono</label>
				<input type="text" name="Telefono" required value="{{ $datos->telefono }}" class="form-control">
			</div> --}}
			{{-- <div class="col-lg-12 col-sm-6 col-md-12 col-xs-12">
				<label for="Imagen">Imagen</label>
				<input type="file" name="Imagen" class="form-control" >
				@if($articulo->Imagen!="")
				
				<img src="{{asset('Imagenes/Empresa/'.$empresa->Nombre.'/'.$articulo->Imagen) }}" width="250px" height="250px">
				@endif
				
			</div>--}}


		</div>
		<hr>



<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
<div class="form-group">
<button class="btn btn-primary" type="submit">Guardar</button>
<button class="btn btn-danger" type="reset">Cancelar</button>
</div>
</div>

		{!!Form::close()!!}
	



</div>

</div>
@endsection