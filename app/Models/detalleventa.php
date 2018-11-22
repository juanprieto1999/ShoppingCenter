<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detalleventa extends Model
{
       protected $table='detalleventa';
    protected $primaryKey='idDetalleVenta';
	public $timestamps=false;
protected $fillable=[ //permite que columnas seran caragadas en forma masiva
'idDetalleVenta',
'idVenta',
'idArticulo',
'Cantidad',
'Precio',
'Estado'
];
}
