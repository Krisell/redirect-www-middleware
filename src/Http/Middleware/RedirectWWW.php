<?php

namespace Krisell\RedirectWWWMiddleware\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class RedirectWWW
{
    /**
     * Peeks into the incoming request and if the subdomain is
     * www, it redirects to main domain.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (substr($request->header('host'), 0, 4) === 'www.') {
            $host = str_replace('www.', '', $request->header('host'));
            $request->headers->set('host', $host);

            return Redirect::to($request->fullUrl(), 301);
        }

        return $next($request);
    }
}
