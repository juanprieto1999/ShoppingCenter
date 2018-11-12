<?php

namespace App\Http\Middleware;

use Closure;

class Tienda
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
      return redirect('/ban');
    }
    else{
        return $next($request);
    }
    if(auth()->user()->idempresa!=null && auth()->user()->idpersona==null ){//Condicion para identificar tienda

          return $next($request);//Continuar acceso  
        }else {
            //Logica para redireccionar a un usuario no registrado
            //dd('No eres una Tienda');
            return redirect('/');
        }

    }

}
