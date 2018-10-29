
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
@foreach ($empresa as $empre)
<div class="btienda">
<img src="{{ asset('Imagenes/Empresa/'.$empre->Nombre.'/'.$empre->Imagen)}}" >
<div id="nombretienda">{{$empre ->Nombre}}</div>
</div>
@endforeach
--}}


@foreach ($articulos as $art)
<div class="item">
<a>
<img src="{{asset('Imagenes/Empresa/'.$art->idEmpresa.'/'.$art->Imagen)}}"   >
</a>
<section>
<h3>{{$art->Nombre}}</h3>
<p> valor : $ {{$art->Valor}} </p>
<p> empresa: {{$art->idEmpresa}} </p>
<p> categoria: {{$art->categoria}} </p>
<p> categoria: {{$art->nempresa}} </p>
<button>Agregar</button>
</section>
</div>
@endforeach


