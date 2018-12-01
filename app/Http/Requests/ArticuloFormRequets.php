<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloFormRequets extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      //Reglas para validar datos a guardar
        return [
          'idCategoria'=>'required',
           'Codigo'=>'max:20',
           'Nombre'=>'required|max:50',
           'Descripcion'=>'max:100',
           'Imagen'=>'mimes:jpeg,bmp,png',
           'Stock'=>'numeric|min:0',
           'Valor'=>'required|max:15'
          ];
    }
}
