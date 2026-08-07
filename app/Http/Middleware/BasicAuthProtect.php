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

        $user = env('BASIC_AUTH_USER');
        $pass = env('BASIC_AUTH_PASSWORD');
        if (empty($user) || empty($pass)) {
            abort(500, 'Basic auth non configuré');
        }
        if (
            $request->getUser() === $user
            && $request->getPassword() === $pass
        ) {
            return $next($request);
        }
        return response('Accès restreint', 401, [
            'WWW-Authenticate' => 'Basic realm="protected"',
        ]);
    }
}
