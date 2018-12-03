@extends ('layouts.DashboardStore')
@section ('contenido')

<div class="row ">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Articulo</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
			</ul>
		</div>
		@endif
		{!!Form::open(array('url'=>'account/user/{id}','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}

		{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<label for="Nombre">Nombre</label>
				<input type="text" name="Nombre" required value="{{old('Nombre')}}" class="form-control" placeholder="Nombre...">
			</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label>Categoria</label>
						<select name="idCategoria" class="form-control">
							@foreach ($categorias as $cat)
								<option value="{{$cat->idCategoria}}">{{$cat->Nombre}}</option>
							@endforeach
						</select>
					</div>
			</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<label for="codigo">Codigo</label>
				<input type="text" name="Codigo"  value="{{old('Codigo')}}" class="form-control" placeholder="Codigo del articulo...">
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<label for="stock">Stock</label>
				<input type="number" name="Stock" id="Stock" value="0" class="form-control" min="0" >
			</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<label for="Descripcion">Descripcion</label>
				<input type="text" name="Descripcion" required value="{{old('Descripcion')}}" class="form-control" placeholder="Descripcion Del Articulo...">
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<label for="valor">Valor</label>
				<input type="text" name="Valor" required value="{{old('Valor')}}" class="form-control" placeholder="Ingrese el valor del producto">
			</div>
			<div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
					<label for="Imagen">Imagen</label>
				<input type="file" name="Imagen" required  class="form-control" >
			</div>
		</div>
		<hr>



		
	</div>
 	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	 	<h3>Avanzado</h3>
	 <input type="checkbox" name="checkbox" id="checkbox" checked="true" > Producto Nuevo	
	</div>
	</div>
	<div class="row ">
		<div class="col-12"></div>
			<button class="btn btn-primary  btn-block" type="submit">Guardar</button>
			{!!Form::close()!!}
			<a href="{{ url('/dash/articulos') }}"><button class="btn btn-danger btn-block" >Cancelar</button></a>
		
	</div>



{{--
<script > 
function on(){
 document.getElementById("Stock").disabled = true;
}

function off(){
 document.getElementById("Stock").disabled = false;
}

var checkbox = document.getElementById('checkbox');

checkbox.addEventListener("change", comprueba, false);

function comprueba(){
  if(checkbox.checked){
      on();
  }else{
     off();
  }
}
</script>--}}
@endsection