<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class nonWwwtoWwwMiddleware
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
        if (env('APP_REDIRECT_TO_WWW', 'yes') === 'yes') {
            $urlSlashExploded = explode('/', $request->url());
            $urlDotExplodex = explode('.', $urlSlashExploded[2]);

            if ($urlDotExplodex[0] === 'investingpartner') {
                array_unshift($urlDotExplodex, 'www');
                $urlSlashExploded[2] = implode('.', $urlDotExplodex);
                $url = implode('/', $urlSlashExploded);
                header('Location: ' . $url, true, 301);
            }
        }
        
        return $next($request);
    }
}
