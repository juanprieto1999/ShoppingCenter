<div class="list-group">
   @foreach ($lista as $tiend)
  <a href="{{url('store/'.$tiend->idEmpresa)}}" class="list-group-item list-group-item-action flex-column align-items-start ">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{{$tiend->Nombre}}</h5>
      <small>{{$tiend->Direccion}}</small>
    </div>
    <p class="mb-1">{{$tiend->Descripcion}}</p>
    <small>{{$tiend->Estado}}</small>
  </a>
   @endforeach
</div>