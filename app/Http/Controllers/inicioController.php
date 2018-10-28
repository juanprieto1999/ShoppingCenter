<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class inicioController extends Controller
{
  public function __construct()
  {
  }
  public function index()
  {
      return view('Inicio/inicio');
  }
  public function listatiendas(){

	$lista=DB::table('empresa')->get();

	return view('Inicio/lista',["lista"=>$lista]);
}


}
