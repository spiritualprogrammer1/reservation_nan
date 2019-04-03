<?php

namespace App\Http\Middleware;

use Closure;

class Isadmin
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
        if($request->isadmin==1)
        {
         return redirect('dashabord.nan');
        }
        else{
            return redirect('home');
        }
        return $next($request);
    }
}
