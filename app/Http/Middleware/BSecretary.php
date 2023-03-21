<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BSecretary
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
     
        if(!Auth::guard('bsec')->check()){ 
            return redirect()->route('bsec_loginform')->with('error','Please login first');
        }
        $user =Auth::guard('bsec')->user();
        if($user->role==2){
            return $next($request);
        }
  
    }
    }

