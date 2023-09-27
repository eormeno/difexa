<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsPublisher {
    public function handle(Request $request, Closure $next): Response {
        if (auth()->check() && auth()->user()->es_publicador) {
            return $next($request);
        }

        return redirect('dashboard');
    }
}
