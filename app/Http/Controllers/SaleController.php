<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\venta;
USE App\Models\detalleventa;
use DB;

class SaleController extends Controller
{
     public function __construct()
    {
        
        $this->middleware('auth');
    }


    public function index(Request $request){
	//$lista = detalleventa::where('idEmpresa','=',auth()->user()->idempresa)->firstOrFail();
	//$lista=DB::table('detalleventa')->select()->where('idEmpresa','=', auth()->user()->idempresa)->get();

	//$venta = venta::findOrFail($lista->idVenta);

	$lista=DB::table('detalleventa as dv')
    	->join('venta as v','dv.idVenta','=','v.idVenta')->join('users as u','u.id','=','v.idUsuario')
    	->select('v.idUsuario','v.Envio','v.Total_Venta','dv.idDetalleVenta','dv.idArticulo','dv.idEmpresa','dv.Cantidad','dv.Precio','dv.Estado','u.name as username')->where('dv.idEmpresa','=', auth()->user()->idempresa)->get(); 

	return view('DashStore/Pedido/index',compact('lista'));
	}

}
