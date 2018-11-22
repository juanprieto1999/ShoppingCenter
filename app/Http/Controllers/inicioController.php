<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class inicioController extends Controller
{
  public function __construct()
  {
    $this->middleware('status')->except('logout');
  }
  public function index()
  {
      return view('Inicio/inicion');
  }
  public function listatiendas(){

	$lista=DB::table('empresa')->where('Estado','=','1')->get(); //Consulta rapida con condicion

	return view('Inicio/lista',["lista"=>$lista]); //Enviar a la vista y 1 parametros
}


}
