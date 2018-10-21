<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
protected $table='persona';
protected $primaryKey='idpersona';
public $timestamps=false;
protected $fillable=[
'idpersona',
'nombre',
'direccion',
'telefono',
'Estado'

];
}
