<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use DB;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
