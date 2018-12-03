<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articulo;
use App\Models\empresa;

use DB;


class searchController extends Controller
{

  //Controlador de la busqueda inteligente en todo el sitio
    public function index(Request $request){

		/*$nombre= $request->get('Nombre');
		$articulos= Articulo::orderBy('idArticulo','DESC')
		->nombre($nombre)
		->paginate(4);
   		return view('Inicio/search',compact('articulos'));*/

   	$query=trim($request->get('searchText'));  //Trim , traemos los datos del request.
$condicion= "";
		$articulos=DB::table('articulo as a')
    	->join('categoria as c','a.idCategoria','=','c.idCategoria') //Relacionar 2 tablas.
    	->join('empresa as emp','a.idEmpresa','=','emp.idEmpresa')
    	->select('a.idArticulo','a.Nombre','a.Codigo','a.Stock','a.Descripcion','c.Nombre as categoria','emp.Nombre as nempresa','a.Imagen','a.Estado','a.Valor','a.idEmpresa','a.isNew')
    ->where('a.Nombre','LIKE','%'.$query.'%')->orwhere('c.Nombre','LIKE','%'.$query.'%')->orwhere('emp.Nombre','LIKE','%'.$query.'%')->paginate('10');
  //  dd($condicion);
     //Busqueda inteligente, tiene como funcion buscar datos relacionados con la BD y los datos solicitados
	//$articulos= Articulo::all();
	return view('Inicio/search',["articulos"=>$articulos,"searchText"=>$query])->with('condicion',$condicion); //Enviar a la vista y 3 parametros.


    }
}
