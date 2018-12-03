<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardUserController extends Controller
{
    public function index()
    {
    	return view('layouts.DashBoardUser');
    }
}
