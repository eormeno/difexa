<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsPublisher {
    public function handle(Request $request, Closure $next): Response {
        if (auth()->check() && auth()->user()->is_publisher) {
            return $next($request);
        }

        return redirect('/');
    }
}
