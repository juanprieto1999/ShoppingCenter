<?php

namespace App\Http\Middleware;

use Closure;

class Usuariom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if(auth()->check()&&auth()->user()->estado==0){
        return redirect('/ban'); //se redirecciona , a la vista ban.
         }
        else{
        //Validar si el usuario es administrador
        if(auth()->user()->idempresa==null && auth()->user()->idpersona!=null ){ 
        return $next($request);  
        }else {

            //Logica para redireccionar a un usuario no registrado
           // dd('No eres Administrador');
            return redirect('/');//Redireccionar a vista inicial
        }
        }
    }
}
