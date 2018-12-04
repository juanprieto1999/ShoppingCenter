<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class pedidocontroller extends Controller
{
  public function index(Request $request){

	$pedido=DB::table('venta as v')
	->select('v.idVenta','v.idUsuario','v.Fecha_Hora','v.Total_Venta')
	->where('v.idUsuario','=',auth()->user()->id)->get();

	$articulos=DB::table('detalleventa as dv')
	->join('venta as v','v.idVenta','=','dv.idVenta')
	->join('articulo as a','dv.idArticulo','=','a.idArticulo')
	->join('empresa as e','e.idEmpresa','=','dv.idEmpresa')
	->select('dv.idDetalleVenta','dv.idArticulo','dv.idVenta','dv.idEmpresa','dv.Cantidad','dv.Precio','dv.Estado','a.Nombre','a.Imagen','e.Nombre as empresa')->get();
	

	return view('DashUser/Pedido/index',compact('pedido','articulos'));
	}
}
