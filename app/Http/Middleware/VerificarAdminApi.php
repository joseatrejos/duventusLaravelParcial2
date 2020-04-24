<?php

namespace App\Http\Middleware;

use Closure;

class VerificarAdminApi
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
        if($request -> user() -> usertype == "Usuario")
            return $next($request);
        else if ($request -> user() -> usertype == 'Administrador')
            return redirect() -> route('api.soloTrabajadores');
    }
}
