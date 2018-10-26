@extends ('layouts.DashboardStore')
@section ('contenido')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Editar Articulo: {{ $articulo->Nombre }}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
			</ul>
		</div>
		@endif



		{!!Form::model($articulo,['method'=>'PATCH','action'=>['articulocontroller@update',$articulo->idArticulo],'files'=>'true'])!!}
		{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<label for="Nombre">Nombre</label>
				<input type="text" name="Nombre" required value="{{ $articulo->Nombre }}" class="form-control">
			</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label>Categoria</label>
						<select name="idCategoria" class="form-control">
							@foreach ($categorias as $cat)
							@if($cat->idCategoria==$articulo->idCategoria)
								<option value="{{$cat->idCategoria}}" selected>{{$cat->Nombre}}</option>
								@else
								<option value="{{$cat->idCategoria}}" >{{$cat->Nombre}}</option>
								@endif
							@endforeach
						</select>
					</div>
			</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<label for="codigo">Codigo</label>
				<input type="text" name="Codigo" required value="{{ $articulo->Codigo }}" class="form-control">
			</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<label for="stock">Stock</label>
				<input type="text" name="Stock"  value="{{$articulo->Stock }}" class="form-control" >
			</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<label for="Descripcion">Descripcion</label>
				<input type="text" name="Descripcion"  value="{{ $articulo->Descripcion }}" class="form-control" placeholder="Descripcion Del Articulo...">
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<label for="valor">Valor</label>
				<input type="text" name="Valor" required value="{{ $articulo->Valor }}" class="form-control">
			</div>
			<div class="col-lg-12 col-sm-6 col-md-12 col-xs-12">
				<label for="Imagen">Imagen</label>
				<input type="file" name="Imagen" class="form-control" >
				@if($articulo->Imagen!="")
				
				<img src="{{asset('Imagenes/Empresa/'.$empresa->Nombre.'/'.$articulo->Imagen) }}" width="250px" height="250px">
				@endif
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