@extends ('layouts.DashboardStore')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Articulo: {{$articulo->Nombre}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>

		{!!Form::model($articulo,['method'=>'PATCH','route'=>['DashStore.edit.update',$articulo->idArticulo],'files'=>'true'])!!}
		{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="Nombre">Nombre</label>
					<input type="text" name="Nombre" required value="{{$articulo->Nombre}}" class="form-control">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6  col-md-6 col-xs-12">
					<div class="form-group">
						<label>Categoria</label>
						<select name="idCategoria" class="form-control">
							@foreach ($categorias as $cat)
							@if($cat->idCategoria==$articulo->idCategoria)
<option value="{{$cat->idCategoria}}" selected>"{{$cat->Nombre}}"</option>
							@else
							<option value="{{$cat->idCategoria}}" selected>"{{$cat->Nombre}}"</option>

							@endif
							@endforeach
						</select>
					</div>
			 </div>
	<div class="col-lg-6 col-sm-6  col-md-6 col-xs-12">
					<div class="form-group">
						<label for="Stock">Stock</label>
						<input type="text" name="codigo" required value="{{$articulo->codigo}}" class="form-control">
					</div>
			 </div>
	<div class="col-lg-6 col-sm-6  col-md-6 col-xs-12">
					<div class="form-group">
						<label for="Descripcion">Descripcion</label>
						<input type="text" name="Descripcion" required value="{{$articulo->Descripcion}}" class="form-control" placeholder="Digite Su Descripcion">
					</div>
			 </div>
			 <div class="col-lg-6 col-md-6  col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="Imagen">Imagen</label>
						<input type="file" name="Imagen" required class="form-control" >
						@if ($articulo->Imagen!="" )
							<img src="{{ asset('Imagenes/Empresa/') }}">
						@endif
					</div>
			 </div>
			

		
<div class="form-group">
<button class="btn btn-primary" type="submit">Guardar</button>
<button class="btn btn-danger" type="reset">Cancelar</button>
</div>

		{!!Form::close()!!}

	</div>
</div>
@endsection