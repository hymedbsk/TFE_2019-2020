<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\User;
class SuperAdmin
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


           if ($user->roles->first()){
                foreach($user->roles as $role){
                    if($role->nom =="Super Admin"){
                        return $next($request);
                    }
                    return redirect('membre');
                }
        } return redirect('membre');
    }
}

