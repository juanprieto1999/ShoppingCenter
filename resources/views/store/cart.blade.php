@extends('layouts.encabezado')
@section('content')
<script src="{{ asset('js/cart.js') }}">
	
</script> 
@if(count($cart))
<p>
	<a href="{{ route('cart-trash') }}" class="btn btn-danger">
		Vaciar Carrito <i class="fa fa-trash"></i>
	</a>
</p>
<div class="table-responsive">
	<table class="table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th>Imagen</th>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($cart as $item)
			<tr>
				<td><img src="{{asset('Imagenes/Empresa/'.$item->Empresaart.'/'.$item->Imagen)}}" width="100" height="100"></td>
				<td>{{ $item->Nombre }}</td>
				<td>${{number_format($item->Valor,2) }}</td>
				<td>
					<input type="number" min="1" value="{{ $item->cantidad}}" 
					id="product_{{$item->idArticulo}}">

						<a href="#" class="btn btn-warning btn-update-item"
						data-href="{{route('cart-update',$item->idArticulo)}}" 
						data-id="{{$item->idArticulo}}">
								<i class="fa fa-refresh"></i>
						</a>
				</td>
				<td>${{number_format($item->Valor * $item->cantidad,2) }}
				</td>
				<td>
					<a href="{{ route('cart-delete',$item->idArticulo) }}" class="btn btn-danger">
						<i class="fa fa-remove"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@else
<h2><span class="lablel label-warning">Aqui no hay nada :(</span></h2>
@endif
<p>
	<a href="{{ url('/') }}" class="btn btn-primary">
		<i class="fa fa-chevron-circle-left">Seguir Comprando</i>
	</a>
	<a href="#" class="btn btn-primary">
		<i class="fa fa-chevron-circle-right">Continuar</i>
	</a>


</p>

@endsection

