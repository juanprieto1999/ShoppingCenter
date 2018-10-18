<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class articulo extends Model
{
        protected $table='articulo';
    	protected $primaryKey='idArticulo';
		public $timestamps=false;
		protected $fillable=[
'idArticulo',
'idEmpresa',
'idCategoria',
'Codigo',
'Nombre',
'Imagen',
'Stock',
'Descripcion',
'Estado',
'Valor'

];
//Se usa esta funcion para relacionar articulo con empresa, con el fin de obtener los datos de empresa.
public function empresa()
	{
		return $this->belongsTo('empresa', 'idEmpresa');
	}
//Se usa este metodo para traer la categoria de cada produtcto
public function categoria()
	{
		return $this->belongsTo(categoria::class);
	}

}
