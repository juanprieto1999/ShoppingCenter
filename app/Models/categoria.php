<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
   protected $table='categoria';
    protected $primaryKey='idCategoria';
	public $timestamps=false;
protected $fillable=[ //permite que columnas seran caragadas en forma masiva
'idCategoria',
'Nombre',
'Descripcion',
'Condicion'

];
//se usa este metodo 
public function articulos(){
	return $this->hasMany(articulo::class);
}
}
