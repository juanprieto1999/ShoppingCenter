<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articulo;
use DB;


class searchController extends Controller
{
    public function index(Request $request){



		/*$nombre= $request->get('Nombre');
		$articulos= Articulo::orderBy('idArticulo','DESC')
		->nombre($nombre)
		->paginate(4);
   		return view('Inicio/search',compact('articulos'));*/
   		$query=trim($request->get('searchText')); 
		$articulos=DB::table('articulo as a')
    	->join('categoria as c','a.idCategoria','=','c.idCategoria')
    	->join('empresa as emp','a.idEmpresa','=','emp.idEmpresa')
    	->select('a.idArticulo','a.Nombre','a.Codigo','a.Stock','a.Descripcion','c.Nombre as categoria','emp.Nombre as nempresa','a.Imagen','a.Estado','a.Valor','a.idEmpresa')
    ->where('a.Nombre','LIKE','%'.$query.'%')->orwhere('c.Nombre','LIKE','%'.$query.'%')->orwhere('emp.Nombre','LIKE','%'.$query.'%')->get();


	//$articulos= Articulo::all();
	return view('Inicio/search',["articulos"=>$articulos,"searchText"=>$query]);


    }
}
