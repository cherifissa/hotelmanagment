<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $userData = session('admin');
        $isadmin = $userData['isadmin'] ?? null;

        if ($isadmin == 'admin') {
            return $next($request);
        }

        return response()->view('middleware.customview', [], 200);
    }
}
