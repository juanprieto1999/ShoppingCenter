<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class pedidocontroller extends Controller
{
    public function index(Request $request){

	$pedido=DB::table('venta as v')->select('idVenta','idUsuario','Fecha_Hora','Total_Venta')->where('idUsuario','=',auth()->user()->id)->get();

	$articulo=DB::table('detalleventa as dv') 
    ->join('articulo as a','dv.idArticulo','=','a.idArticulo')
    ->join('venta as v', 'dv.idVenta','=','v.idVenta') //Relacionar 2 tablas
    ->select('a.Nombre','a.Imagen','a.idEmpresa','dv.idDetalleVenta','dv.idVenta','dv.idArticulo','dv.cantidad','dv.Precio','dv.Estado','v.Fecha_Hora')
    ->where('v.idUsuario','=',auth()->user()->id)->get(); 

	return view('DashUser/Pedido/index',compact('pedido'));
	}
}
