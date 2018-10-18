<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ShoppingCenter\Models\articulo;
use ShoppingCenter\Models\empresa;
use Illuminate\Support\Facades\Input;
use DB;

class storecontroller extends Controller
{

	    public function __construct()
    {
      //  $this->middleware('auth');
    }
    public function index($id)
  {   $empresa=DB::table('empresa')->select('idEmpresa','Nombre','Imagen')->where('idEmpresa','=',$id)->get();
            $articulos=DB::table('articulo as a')
            ->join('empresa as e','a.idEmpresa','=','e.idEmpresa')
            ->select('a.idArticulo','a.Nombre','e.Nombre as empresa','a.Imagen','a.Estado','a.Valor')
            ->where('a.Estado','=','1')
            ->where('e.idEmpresa','=',$id)
            ->orderby('a.idArticulo','desc')
            ->paginate('12');
return view('store',["articulos"=>$articulos,"empresa"=>$empresa]);

  }
public function store(){
$Articulo = new articulo;
return Redirect::to('store');

}

   public function show($id)
    { 
        return view("store.show",["articulo"=>articulo::findOrFail($id)]);
    }







}
