<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    protected $table='venta';
    protected $primaryKey='idVenta';
	public $timestamps=false;
	protected $fillable=[ //permite que columnas seran caragadas en forma masiva
	'idVenta',
	'idUsuario',
	'Fecha_Hora',
	'Envio',
	'Total_Venta',
	'Estado'
	];
}
