<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articulo;


class searchController extends Controller
{
    public function index(Request $request){
		$nombre= $request->get('Nombre');
		$articulos= Articulo::orderBy('idArticulo','DESC')
		->nombre($nombre)
		->paginate(4);
   		return view('Inicio/search',compact('articulos'));


    }
}
