<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next) : Response
    {
        if (!$request->user() || !$request->user()->is_admin) {
            abort(404);
        }
        return $next($request);
    }
}
