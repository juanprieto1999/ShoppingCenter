<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fecha</th>
      <th scope="col">Producto</th>
      <th scope="col">Usuario</th>
      <th scope="col">Estado</th>

    </tr>
  </thead>
  <tbody>
  	@foreach($lista as $list)
    <tr>
      <th scope="row">{{$list->idDetalleVenta}}</th>
      <td></td>
      <td>{{ $list->idArticulo }}</td>
      <td></td>
      <td> {{ $list->Estado }}</td>
    </tr>
    @endforeach
  
  </tbody>
</table>