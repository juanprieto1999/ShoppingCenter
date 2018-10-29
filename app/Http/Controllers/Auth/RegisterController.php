<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Persona;
use App\Models\Empresa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm($tipo)
    {
        // condicion que permite validar cual rol sera loguedo
        if($tipo=='user'){
            return view('auth.register');
        }elseif($tipo=='store'){
           return view('auth.registerstore'); 
        }
        else{
            return view('Inicio.inicion');
        }

    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if(isset($data['nit'])==false) {

        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'nombre' => 'required|string',
            'direccion'=> 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', //password_confirmation
        ]);
    }
        else{
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'nombreempresa' => 'required|string',
            'descripcion' => 'string|max:50',
            'nit'=> 'string|max:10',
            'direccion'=> 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', //password_confirmation

        ]);


}


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
 if(isset($data['nit'])==false){

        $usuario = Persona::create([
            'nombre' => $data['nombre'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'Estado' => '1',
        ]);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'idpersona' => $usuario->idpersona,
        ]);
    }else{
      $tienda =empresa::create([
            'Nombre' => $data['nombreempresa'],
            'Direccion' => $data['direccion'],
            'Descripcion' => $data['descripcion'],
            'Nit' => $data['nit'],
            'telefono' => $data['telefono'],
            'Estado' => '1',
        ]);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'idempresa' => $tienda->idEmpresa,
        ]);  
       
    }
    }
}
