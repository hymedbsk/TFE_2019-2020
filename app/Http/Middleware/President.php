<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\User;
class President
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {    $user = Auth::user();


            // do something with role here

        if ($user->roles=='Président'){
			return $next($request);

    }
		return new RedirectResponse(url('/'));
    }
}
