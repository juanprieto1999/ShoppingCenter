@extends('layouts.encabezado')
@section('content')

<head>
	 <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
</head>
<div class="container text-center">
	<div class="page-header">
		<h1><i class="fa fa-shopping-cart"></i> Detalle del producto</h1>
	</div>
	<div class="page">
		<div class="table-responsive">
			<h3>Datos del usuario</h3>
			<table class="table table-striped table-hover table-bordered">
			<tr><td>Usuario:</td><td>{{ Auth::user()->name }}</td></tr>
			<tr><td>Correo: </td><td>{{ Auth::user()->email }}</td></tr>
			<tr><td>Direccion: </td><td>{{ $data->direccion }} 
				<li class="fa fa-edit" ></li>  

			</td></tr>


			</table>
		</div>
		<div class="table-responsive">
			<h3>Datos del pedido</h3>
			<table class="table table-striped table-hover table-bordered">
				<tr>
					<th>Producto</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Subtotal</th>
				</tr>
				<tr>
					@foreach($cart as $item)
					<tr>
						<td>{{ $item->Nombre }}</td>
						<td>${{number_format($item->Valor,2) }}</td>
						<td>{{ $item->cantidad }}</td>
						<td>${{number_format($item->Valor*$item->cantidad,2) }}</td>
					</tr>
					@endforeach
				</tr>
			</table>
			<h3><span class="label label-success">Total: ${{ number_format($total,2) }}</span></h3>
			<hr>
			<p>
				<a href="{{route('cart-show')}}" class="btn btn-primary">
					<i class="fa fa-chevron-circle-left"></i>Regresar
				</a>
				<a  href="{{ route('payment') }}" class="btn btn-warning">
					Pagar con <i class="fa fa-paypal"></i>
				</a>
			</p>

		</div>
	</div>

</div>
@endsection