<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Http\Requests\CategoriaFormRequest;
use DB;

class categoriacontroller extends Controller
{
    public function index(Request $request){

    //$query=trim($request->get('searchText')); //Busqueda
	$categorias=DB::table('categoria as c') 
    ->select('idCategoria','Nombre','Descripcion','Condicion')->get(); 
	return view('DashAdmi/Categoria/index',["categorias"=>$categorias]);

}


public function create()
    {
        return view("DashAdmi.Categoria.create");//Retorna la vista y envia  parametro
    }
 public function store(CategoriaFormRequest $request)
    {

        $categoria=new categoria; //Nuevo objeto para guardar categoria    
    //Usamos request para  los datos traidos de la vista y guardarlos en Eloquent, luego proceder a guardarlos en la base de datos   
        $categoria->Nombre=$request->get('Nombre');
        $categoria->Descripcion=$request->get('Descripcion');
        $categoria->Condicion='1'; //Guardamos con 1, para dejarla activida en la BD.
	    $categoria->save(); //Guardar cambios en la base de datos.
return Redirect::to('dashadmin/categorias'); //Redirijir  a la vista 
   
    }

   public function edit($id)
    {
        $categoria=categoria::findOrFail($id); //Buscar el categoria por id
        return view("DashAdmi.Categoria.edit",["categoria"=>$categoria]); //Enviar a la vista y 3 parametros
    }

    public function update(CategoriaFormRequest $request,$id){
        $categoria=categoria::findOrFail($id); ////Buscar el categoria 
        //Usamos request para  los datos traidos de la vista y guardarlos en Eloquent, luego proceder a guardarlos en la base de datos      
        $categoria->Nombre=$request->get('Nombre');
        $categoria->Descripcion=$request->get('Descripcion');
        $categoria->Condicion='1';
        $categoria->update();

        return Redirect::to('dashadmin/categorias');
    }
    public function destroy($id)
   {
    $categoria=categoria::findOrFail($id);
    if($categoria->Condicion==1){
        $categoria->Condicion='0'; // envia 0
    }else{
        $categoria->Condicion='1'; // envia 1
    }
    $categoria->update(); //Actualizamos el categoria en la BD.

    return Redirect::to('dashadmin/categorias'); //Redirijir  a la vista 
    }


}
