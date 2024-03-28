<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        $allowedDomain = 'دامنه'; // دامنه‌ی مجاز
//
//        if ($request->getHost() != $allowedDomain) {
//            return response()->json(['error' => 'Unauthorized domain'], 403);
//        }

        return $next($request);
    }
}
