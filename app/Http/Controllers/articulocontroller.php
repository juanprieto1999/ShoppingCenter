<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articulo;
use App\Models\empresa;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ArticuloFormRequets;
use DB;

class articulocontroller extends Controller
{
    public function index(Request $request){

    $query=trim($request->get('searchText')); //Busqueda
    $idempresa=auth()->user()->idempresa;  //Obtener el id de empresa logueado
	$articulos=DB::table('articulo as a') 
    ->join('categoria as c','a.idCategoria','=','c.idCategoria') //Relacionar 2 tablas
    ->select('a.idArticulo','a.Nombre','a.Codigo','a.Stock','a.Descripcion','c.Nombre as categoria','a.Imagen','a.Estado','a.Valor','a.idEmpresa')
    ->where('a.Nombre','LIKE','%'.$query.'%')->orwhere('a.Codigo','LIKE','%'.$query.'%')
    ->where('idempresa','=',$idempresa)->get(); //Igualar que la empresa consultada es igual a la empresa logueada

	return view('DashStore/Articulo/index',["articulos"=>$articulos,"searchText"=>$query]);

}
public function create()
    {
        //Metodo para crear
        $categorias=DB::table('categoria')->where('Condicion','=','1')->get(); 
        return view("DashStore.Articulo.create",["categorias"=>$categorias]);//Retorna la vista y envia  parametro
    }
 public function store(ArticuloFormRequets $request)
    {
    //Metodo para guardar articulo
        $profession=empresa::find(auth()->user()->idempresa);
    //$profession->users()->where('is_admin', true)->get();
        $articulo=new articulo; //Nuevo objeto para guardar articulo    
    //Usamos request para  los datos traidos de la vista y guardarlos en Eloquent, luego proceder a guardarlos en la base de datos      
        $articulo->idEmpresa=auth()->user()->idempresa;
        $articulo->idCategoria=$request->get('idCategoria');
        $articulo->Nombre=$request->get('Nombre');
        $articulo->Codigo=$request->get('Codigo');
        $articulo->Stock=$request->get('Stock');
        $articulo->Descripcion=$request->get('Descripcion');
        $articulo->Estado='1'; //Guardamos con 1, para dejarla activida en la BD.
        $articulo->Valor=$request->get('Valor');
    //
        //Funcion que permite traer el nombre de la imagen de la vista
        if(Input::hasFile('Imagen')){
            $file=Input::file('Imagen'); //Nueva variable
            $file->move(public_path().'/imagenes/Empresa/'.$profession->Nombre.'/',$file->getClientOriginalName());//Obtener El Nombre
            $articulo->imagen=$file->getClientOriginalName(); //Asignar EL nombre de la imagen al articulo de la BD.
        }
        //
        $articulo->save(); //Guardar cambios en la base de datos.

return Redirect::to('dash/articulos'); //Redirijir  a la vista 
   
    }

   public function edit($id)
    {
        $profession=empresa::find(auth()->user()->idempresa); //Buscar en la BD por el usuario loguedo y traer id empresa.
        $articulo=Articulo::findOrFail($id); //Buscar el articulo por id
        $categorias=DB::table('categoria')->where('Condicion','=','1')->get(); //Traer las categorias activadas
        return view("DashStore.Articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias,"empresa"=>$profession]); //Enviar a la vista y 3 parametros
    }

    public function update(ArticuloFormRequets $request,$id){
        $empresa=empresa::find(auth()->user()->idempresa); //Buscar en la BD por el usuario loguedo y traer id empresa.
        $articulo=Articulo::findOrFail($id); ////Buscar el articulo 
        //Usamos request para  los datos traidos de la vista y guardarlos en Eloquent, luego proceder a guardarlos en la base de datos      
        $articulo->idCategoria=$request->get('idCategoria');
        $articulo->Nombre=$request->get('Nombre');
        $articulo->Codigo=$request->get('Codigo');
        $articulo->Stock=$request->get('Stock');
        $articulo->Descripcion=$request->get('Descripcion');
        $articulo->Estado='1';
        $articulo->Valor=$request->get('Valor');
        //

        if(Input::hasFile('Imagen')){
            $file=Input::file('Imagen');
            $file->move(public_path().'/imagenes/Empresa/'.$empresa->Nombre.'/',$file->getClientOriginalName());//Obtener El Nombre
            $articulo->imagen=$file->getClientOriginalName();
        }
$articulo->update();

return Redirect::to('dash/articulos');
    }
    //Cambia el estado del articulo en el dashboard tienda
    public function destroy($id)
   {
    $articulo=articulo::findOrFail($id);
    if($articulo->Estado==1){
        $articulo->Estado='0'; // envia 0
    }else{
        $articulo->Estado='1'; // envia 1
    }
    $articulo->update(); //Actualizamos el articulo en la BD.

    return Redirect::to('dash/articulos'); //Redirijir  a la vista 

       }
}
