<?php

namespace App\Http\Middleware;

use Closure;

class AuthControl
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
        $token = $request->session()->get('token');
        if(isset($token) && !empty($token))
        {
            return $next($request);
        }else{
            return  redirect()->route('login');
        }

    }
}
