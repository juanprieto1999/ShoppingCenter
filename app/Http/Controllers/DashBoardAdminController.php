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

//Consulta de dashboard
	 $ntiendas=DB::table('empresa')->SELECT()->count();
	 $nusuarios=DB::table('persona')->SELECT()->count();
     //dd($ntiendas);
	return view('DashAdmi/index')->with('ntiendas',$ntiendas)->with('nusuarios',$nusuarios);
}
//Metodo que lista las tiendas en el dashboard
public function tindex(Request $request){
	$listatiendas=DB::table('empresa')->get();
	return view('DashAdmi/Tiendas/index',["listatiendas"=>$listatiendas]);

}



}
