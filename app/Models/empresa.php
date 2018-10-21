<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class empresa extends Model
{
    protected $table='empresa';
    protected $primaryKey='idEmpresa';
	public $timestamps=false;
protected $fillable=[ //permite que columnas seran caragadas en forma masiva
'idEmpresa',
'Nombre',
'Direccion',
'Descripcion',
'Nit',
'Telefono',
'Estado'

];
}
/*public function articulos()
	{
		return $this->hasMany('articulos', 'idEmpresa');
	}
    }*/
