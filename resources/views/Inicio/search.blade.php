<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    {{--
{{Form::open(['route' => 'busqueda', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
<div class="form-group">
    {{ Form::text('Nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombres']) }}
</div>
 <div class="form-group">
    <button type="submit" class="btn btn-default">
    	<span class="glyphicon glyphicon-search"></span>
   </button>
</div>
 {{Form::close()}}

<div class="col-md-8">
                <table class="table table-hover table-striped">
                    <tbody>
                        @foreach($articulos as $art)
                        <tr>
                           <td>{{$art->idArticulo}}</td>
							<td>{{$art->Nombre}}</td>
							<td>{{$art->Codigo}}</td>
							<td>{{$art->categoria}}</td>
							<td>{{$art->Descripcion}}</td>
							<td>{{$art->Stock}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
</div>

--}}
</body>
</html>