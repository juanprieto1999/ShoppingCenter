<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class empresa extends Model
{
    protected $table='empresa';
    protected $primaryKey='idEmpresa';
	public $timestamps=true;
protected $fillable=[ //permite que columnas seran caragadas en forma masiva
'idEmpresa',
'Nombre',
'Direccion',
'Descripcion',
'Nit',
'Correo',
'Estado',
'Imagen'

];
public function articulos()
	{
		return $this->hasMany('articulos', 'idEmpresa');
	}
    }
