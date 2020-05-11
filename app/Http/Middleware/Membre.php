<?php

namespace App\Http\Middleware;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Closure;
use Illuminate\Http\RedirectResponse;
use Auth;
class Membre
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
      	if(Auth::user()->membre == 1){
            return $next($request);
        }

	return new RedirectResponse(url('home'));
    }
}

