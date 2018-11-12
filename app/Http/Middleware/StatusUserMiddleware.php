<?php

namespace App\Http\Middleware;

use Closure;


class StatusUserMiddleware
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

}
}
