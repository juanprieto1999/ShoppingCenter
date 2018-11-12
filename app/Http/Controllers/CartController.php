<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App/articulo;

class CartController extends Controller
{
	public function construct(){
     if(!\Session::has('cart'))\Session::put('cart',array());

	}
    public function show(){
      $cart-\Session::get('cart');
      $total-$this->total();
      return view('store.cart',compact('cart','total'));

    }
}
