<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdmin {
    public function handle(Request $request, Closure $next): Response {
        if (auth()->check() && auth()->user()->es_admininstrador) {
            return $next($request);
        }

        return redirect('/');
    }
}
