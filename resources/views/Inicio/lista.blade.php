<table class="table table-striped table-bordered table-condensed table-hover">
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
      </table>