<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Models\persona;
use App\Models\empresa;
use App\Http\Requests\UserFormRequest;
use DB;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth'); //middleware que permite bloquear el acceso si no se ha iniciado sesion
       $this->middleware('status')->except('logout'); ////middleware que permite bloquear el acceso al usuario desactivado
   }
    public function index()
    {
       $listausuarios=DB::table('Users as u')
        ->select('u.id','u.name','u.email','u.idempresa','u.idpersona','u.estado')->get();
        //Consulta rapida para traer todos los datos de la tabla.
        return view('DashAdmi/Usuarios/index',["listausuarios"=>$listausuarios]); //Enviar a la vista y 1 parametros
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function profile_edit()
    {
        $user=User::findOrFail(auth()->user()->id);
        if($user->idpersona!=null){
       
        $datos=persona::findOrFail($user->idpersona);
        return view("DashUser.Cuenta",["User"=>$user,"datos"=>$datos]); 
        }else{
        $datos=empresa::findOrFail($user->idempresa);
        return view("DashUser.Cuenta",["User"=>$user,"datos"=>$datos]); 
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request,$id)
    {
       $user=User::findOrFail($id);   
        if($user->idpersona!=null){
        $user->name=$request->get('name');
        $user->email=$request->get('email');

       // if(Input::hasFile('Imagen')){
       //      $file=Input::file('Imagen');
       //      $file->move(public_path().'/imagenes/Empresa/'.$empresa->Nombre.'/',$file->getClientOriginalName());//Obtener El Nombre
       //      $user->imagen=$file->getClientOriginalName();
       //  }
        }
        $user->update();

        return Redirect::to('/account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//Cambia el estado del usuario en el dashboard admin
  $usuario=User::findOrFail($id); //busqueda rapida con el id.
    //Condicion que permite saber si el usuario esta activo o desactivo, si esta activada la desctivara , si esta desactiva la activara.

    if($usuario->estado==1){

        $usuario->estado='0'; //envia 0 "Desactivada"
    }else{
        $usuario->estado='1'; //envia 1 "Activada"
    }

    $usuario->update();
    return Redirect::to('dashadmin/users');
    }
}
