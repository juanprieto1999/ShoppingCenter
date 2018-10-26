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
    $idempresa=auth()->user()->idempresa;  
	$articulos=DB::table('articulo as a')
    ->join('categoria as c','a.idCategoria','=','c.idCategoria')
    ->select('a.idArticulo','a.Nombre','a.Codigo','a.Stock','a.Descripcion','c.Nombre as categoria','a.Imagen','a.Estado','a.Valor','a.idEmpresa')
    ->where('idempresa','=',$idempresa)->get();


	//$articulos= Articulo::all();
	return view('DashStore/Articulo/index',["articulos"=>$articulos]);

}
public function create()
    {
        $categorias=DB::table('categoria')->where('Condicion','=','1')->get(); 
        return view("DashStore.Articulo.create",["categorias"=>$categorias]);
    }
 public function store(ArticuloFormRequets $request)
    {
        $profession=empresa::find(auth()->user()->idempresa);
        //$profession->users()->where('is_admin', true)->get();
        $articulo=new articulo;            
        $articulo->idEmpresa=auth()->user()->idempresa;
        $articulo->idCategoria=$request->get('idCategoria');
        $articulo->Nombre=$request->get('Nombre');
        $articulo->Codigo=$request->get('Codigo');
        $articulo->Stock=$request->get('Stock');
        $articulo->Descripcion=$request->get('Descripcion');
        $articulo->Estado='1';
        $articulo->Valor=$request->get('Valor');
        if(Input::hasFile('Imagen')){
            $file=Input::file('Imagen');
            $file->move(public_path().'/imagenes/Empresa/'.$profession->Nombre.'/',$file->getClientOriginalName());//Obtener El Nombre
            $articulo->imagen=$file->getClientOriginalName();
        }
        
        $articulo->save();

return Redirect::to('dash/articulos');
   
    }

   public function edit($id)
    {
        $profession=empresa::find(auth()->user()->idempresa);
        $articulo=Articulo::findOrFail($id);
        $categorias=DB::table('categoria')->where('Condicion','=','1')->get();
        return view("DashStore.Articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias,"empresa"=>$profession]);
    }

    public function update(ArticuloFormRequets $request,$id){
        $empresa=empresa::find(auth()->user()->idempresa);
$articulo=Articulo::findOrFail($id);
$articulo->idCategoria=$request->get('idCategoria');
        $articulo->Nombre=$request->get('Nombre');
        $articulo->Codigo=$request->get('Codigo');
        $articulo->Stock=$request->get('Stock');
        $articulo->Descripcion=$request->get('Descripcion');
        $articulo->Estado='1';
        $articulo->Valor=$request->get('Valor');
        if(Input::hasFile('Imagen')){
            $file=Input::file('Imagen');
            $file->move(public_path().'/imagenes/Empresa/'.$empresa->Nombre.'/',$file->getClientOriginalName());//Obtener El Nombre
            $articulo->imagen=$file->getClientOriginalName();
        }
$articulo->update();

return Redirect::to('dash/articulos');
    }



    

    //Cambia el estado de la tienda en el daashboard admin

    public function destroy($id)
   {
    $articulo=articulo::findOrFail($id);
    if($articulo->Estado==1){
        $articulo->Estado='0';
    }else{
        $articulo->Estado='1';
    }
    $articulo->update();

    return Redirect::to('dash/articulos');

       }
}
