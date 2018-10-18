<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
protected $table='persona';
protected $primaryKey='idpersona';
public $timestamps=false;
protected $fillable=[
'idpersona',
'nombre',
'tipo_documento',
'num_documento',
'direccion',
'telefsono',
'Estado'

];
}
