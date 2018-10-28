<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listatiendaController extends Controller
{
   public function index()
    {
        return view('Inicio.storeslist');
    }

}
