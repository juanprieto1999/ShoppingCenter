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
      //  $this->middleware('auth');
    }
    public function index($id)
  {   
$validar=empresa::findOrFail($id);
if($validar->Estado==1){
 $empresa=DB::table('empresa')->select('idEmpresa','Nombre','Imagen','Estado')->where('idEmpresa','=',$id)->get();
 $articulos=DB::table('articulo as a')
            ->join('empresa as e','a.idEmpresa','=','e.idEmpresa')
            ->select('a.idArticulo','a.Nombre','e.Nombre as empresa','a.Imagen','a.Estado','a.Valor')
            ->where('a.Estado','=','1')
            ->where('e.idEmpresa','=',$id)
            ->orderby('a.idArticulo','desc')
            ->paginate('12');
            return view('store',["articulos"=>$articulos,"empresa"=>$empresa]);
}return "Pagina Fuera De Servicio";//response()->view('errors.404', [], 404);
           


  }
public function store(){
$Articulo = new articulo;
return Redirect::to('store');

}

   public function show($id)
    { 
        return view("store.show",["articulo"=>articulo::findOrFail($id)]);
    }

 public function destroy($id)
   {

  $tienda=empresa::findOrFail($id);
    if($tienda->Estado==1){
        $tienda->Estado='0';
    }else{
        $tienda->Estado='1';
    }
    $tienda->update();

    return Redirect::to('dashadmin/stores');

       }




}
