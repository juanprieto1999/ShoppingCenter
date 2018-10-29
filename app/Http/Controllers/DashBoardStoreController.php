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
    }
public function index(Request $request){
    
     //dd($ntiendas);
	
	return view('DashStore/index');
}




}
