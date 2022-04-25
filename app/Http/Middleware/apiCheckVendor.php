<?php

namespace App\Http\Middleware;

use Closure;

class apiCheckVendor
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
        if (isset($request->vendor_uuid))
            return $next($request);
        else {
            return abort(404);
        }
    }
}
