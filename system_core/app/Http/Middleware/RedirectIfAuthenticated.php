<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect('/dashboard');
        }
        
        if ($guard == "member" && Auth::guard('member')->check()) {
            return redirect('/member/dashboard');
        }
        // abort(404);
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }
        return $next($request);
    }
}
