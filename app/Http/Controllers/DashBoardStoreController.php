<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\empresa;
use App\Models\User;
use DB;

class DashBoardStoreController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); //middleware que permite bloquear el acceso si no se ha iniciado sesion
       $this->middleware('status')->except('logout'); ////middleware que permite bloquear el acceso al usuario desactivado
   }
public function index(Request $request){
	
	$lista=DB::table('detalleventa')->select()->where('idEmpresa','=', auth()->user()->idempresa)->get();

	return view('DashStore/index',compact('lista'));
}




}
