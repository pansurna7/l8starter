<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SudahLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('LonggedUser') && (url('staff/staff-login')== $request->url())){
            return back();
        }
        return $next($request);
    }
}
