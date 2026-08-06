<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BasicAuthProtect
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            $request->getUser() === env('BASIC_AUTH_USER')
            && $request->getPassword() === env('BASIC_AUTH_PASSWORD')
        ) {
            return $next($request);
        }
        return response('Accès restreint', 401, [
            'WWW-Authenticate' => 'Basic realm="protected"',
        ]);
    }
}
