<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthSuperAdmin
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
        if(Auth::user()->utype === 'SADM'){
            return $next($request);
        }
        elseif (Auth::user()->utype === 'EMP') {
            return $next($request);
        }
        elseif (Auth::user()->utype === 'FEMP') {
            return $next($request);
        }
        elseif (Auth::user()->utype==='CADM') {
            return $next($request);
        }
        else{
            session()->flush();
            return redirect()->route('login');
        }
    }
}
