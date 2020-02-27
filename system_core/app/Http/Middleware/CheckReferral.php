<?php

namespace App\Http\Middleware;

use Closure;

class CheckReferral
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
        if(!$request->query('ref')){
            return $next($request);
        }
        
        if($request->query('ref') && !$request->hasCookie('referral')){
            return redirect($request->fullUrl())->withCookie(cookie('referral', $request->query('ref'), 30*24*60)); // save cookie for 30 day
        }

        return $next($request);
        
    }
}
