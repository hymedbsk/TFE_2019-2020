<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Auth;
class CompteCheck
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
        // echo($request->user());
        // return $next($request);
        if(Auth::user()->compte_check == 1){
            return $next($request);
        }
        else{
            return new RedirectResponse(url('/error'));
        }

    }
}

