<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\VentaFormRequest;
use app\Models\venta;
use app\Models\detalleventa;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class venta extends Controller
{
    public function index(Request $request)
    {

    }
	public function store(VentaFormRequest $request)
    {
    	try{
    		DB::BeginTransaction();
    		$venta= new venta;
    		$venta->idUsuario= \Auth::user()->id;

    		$mytime= Carbon::now('America/Bogota')
    		$venta->Fecha_Hora=$mytime->ToDateTimeString();
    		$venta->Direccion_Envio=;
    		$venta->Envio=;
    		$venta->Total_Venta=;


			DB::Commit();
    	}

    }



}
