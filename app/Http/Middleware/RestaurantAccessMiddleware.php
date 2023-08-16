<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestaurantAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userData = session('server');
        $isadmin = $userData['isadmin'] ?? null;

        if ($isadmin === 'server') {
            return $next($request);
        }

        return response()->view('middleware.customview', [], 200);
    }
}
