<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ShoppingCenter\Models\articulo;
use Illuminate\Support\Facades\Redirect;
use App\Models\empresa;
use Illuminate\Support\Facades\Input;
use DB;

class storecontroller extends Controller
{

	    public function __construct()
    {
    }
    public function index($id)
  {   
$validar=empresa::findOrFail($id); //Busqueda rapida en la Bd.
//Condicion que permite determinar si la tienda se encuentra en servicio o fuera de servicio.
if($validar->Estado==1){
 $empresa=DB::table('empresa')->select('idEmpresa','Nombre','Imagen','Descripcion','Estado')->where('idEmpresa','=',$id)->get(); //Consulta a la tabla empresa para traer sus datos.
 $articulos=DB::table('articulo as a')
            ->join('empresa as e','a.idEmpresa','=','e.idEmpresa')
            ->select('a.idArticulo','a.Nombre','e.Nombre as empresa','a.Imagen','a.Estado','a.Valor')
            ->where('a.Estado','=','1')
            ->where('e.idEmpresa','=',$id)
            ->orderby('a.idArticulo','desc')
            ->paginate('5'); //Consulta para traer todos los articulos de la empresa.
            return view('store',["articulos"=>$articulos,"empresa"=>$empresa]);
}return "Pagina Fuera De Servicio";// Si la consulta a la tabla es 0 "Fuera de servicio",Mostramos esto en pantalla.
           


  }
public function store(){
$Articulo = new articulo;
return Redirect::to('store'); //Guardar un articulo

}

   public function show($id)
    { 
      dd($id);
      return view("store.show",["articulo"=>articulo::findOrFail($id)]); //Ver un articulo
      
    }

 public function destroy($id)
   {
 //Cambia el estado de la tienda en el dashboard admin
  $tienda=empresa::findOrFail($id); //busqueda rapida con el id.
    //Condicion que permite saber si la tienda esta activa o desactiva, si esta activada la desctivara , si esta desactiva la activara.
    if($tienda->Estado==1){
        $tienda->Estado='0'; //envia 0 "Desactivada"
    }else{
        $tienda->Estado='1'; //envia 1 "Activada"
    }
    $tienda->update();

    return Redirect::to('dashadmin/stores');

       }




}
