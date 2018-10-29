<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashBoardAdminController extends Controller
{
  public function __construct()
    {
       $this->middleware('auth');
    }
public function index(Request $request){

//Usamos estas consultas para contar los datos solicitados  en la BD.
	 $ntiendas=DB::table('empresa')->SELECT()->count(); // Consulta contar para empresas registradas en la BD
	 $nusuarios=DB::table('persona')->SELECT()->count();
	 //
     //dd($ntiendas);
	return view('DashAdmi/index')->with('ntiendas',$ntiendas)->with('nusuarios',$nusuarios);
}
//Metodo que lista las tiendas en el dashboard
public function tindex(Request $request){
	$listatiendas=DB::table('empresa')->get(); //Consulta rapida para traer todos los datos de la tabla.
	return view('DashAdmi/Tiendas/index',["listatiendas"=>$listatiendas]); //Enviar a la vista y 1 parametros

}



}
