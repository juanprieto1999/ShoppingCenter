{{-- <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <th>Id</th>
          <th>Nombre</th>
          <th>Direccion</th>        
        </thead>
        @foreach ($lista as $tiend)
        <tr>
          <td>{{$tiend->idEmpresa}}</td>
          <td>{{$tiend->Nombre}}</td>
          <td>{{$tiend->Direccion}}</td>
          
          
        </tr>

        @endforeach
      </table> --}}
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