<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articulo;
use App\Models\empresa;

class CartController extends Controller
{
	
	public function construct(){
     if(!\Session::has('cart'))\Session::put('cart',array()); //identifica si la variable sesion cart existe.

	}
    public function show(){
	$cart= \Session::get('cart');
      return view('store.cart',compact('cart'));
    }


	public function add(articulo $Articulo){
	$cart=\Session::Get('cart');//Recibe la variable y la guarda en cart
	$Articulo->cantidad=1;// agrega cantidad de producto y defino en 1
	$empresa= empresa::findOrFail($Articulo->idEmpresa); //Consulta rapida para traer el nombre de la empresa
	$Articulo->Empresaart= $empresa->Nombre;//Guardar nombre de la empresa en el array
	$cart[$Articulo->idArticulo]=$Articulo; //Guardar todo el articulo y definir la posicion en el array
	\Session::put('cart',$cart); //Actualizar variable sesion
	return redirect()->route('cart-show');
	}


	public function delete(articulo $Articulo){
	$cart=\Session::Get('cart');//Recibe la variable y la guarda en cart
	unset($cart[$Articulo->idArticulo]);//eliminar elemento segun su posicion
	\Session::put('cart',$cart);
	return redirect()->route('cart-show');
	}
public function trash(){
	\Session::forget('cart'); //Vacia el carrito
	return redirect()->route('cart-show');
}


public function update(articulo $articulo,$cantidad){
$cart=\Session::Get('cart');//Recibe la variable y la guarda en cart
$cart[$articulo->idArticulo]->cantidad = $cantidad;
\Session::put('cart',$cart); //Actualizar variable sesion
return redirect()->route('cart-show');//finalmente redirijira a show
}

}
