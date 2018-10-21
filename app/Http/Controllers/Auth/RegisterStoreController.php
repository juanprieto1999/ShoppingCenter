<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterStoreController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/dashstore';

 	public function __construct()
    {
        $this->middleware('guest');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'nombre' => 'required|string',
            'direccion'=> 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', //password_confirmation

        ]);
    }
    protected function create(array $data)
    {
        $usuario = Persona::create([
            'nombre' => $data['nombre'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'Estado' => '1',
        ]);
        //dd($usuario->idpersona); 
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'idpersona' => $usuario->idpersona,
        ]);
       
    }
     public function showRegistrationForm()
    {
        return view('auth.registerstore');
    }



}
