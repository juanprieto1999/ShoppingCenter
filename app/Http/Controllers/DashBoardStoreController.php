<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use DB;

class DashBoardStoreController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
public function index(Request $request){
     //dd($ntiendas);
	return view('DashStore/index');
}




}