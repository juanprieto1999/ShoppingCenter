<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inicioController extends Controller
{
  public function __construct()
  {
  }
  public function index()
  {
      return view('Inicio/inicio');
  }
}
