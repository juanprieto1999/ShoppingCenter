<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articulo;

class CartController extends Controller
{
	
	public function construct(){
     if(!\Session::has('cart'))\Session::put('cart',array()); //identifica si la variable sesion cart sirve.

	}
    public function show(){
      $cart-\Session::get('cart');
      $total-$this->total();
      return view('store/cart',compact('cart','total'));

    }

public function add(Product $Product){
$cart=\Session::Get('cart');//Recibe la variable y la guarda en cart
$Product->quantity=1;// agrega cantidad de producto y defino en 1
$car[$Product->slug]=$Product;
\Session::put('cart',$cart);
return redirect()->route('cart-show');
}
public function delete(Product $Product){
$cart=\Session::Get('cart');//Recibe la variable y la guarda en cart
unset($cart[$product->slug]);
\Session::put('cart',$cart);
return redirect()->route('cart-show');
}
public function update(Product $Product,$quantity){
$cart=\Session::Get('cart');//Recibe la variable y la guarda en cart
unset($cart[$product->slug]);
\Session::put('cart',$cart);
return redirect()->route('cart-show');//finalmente redirijira a show
}

}
