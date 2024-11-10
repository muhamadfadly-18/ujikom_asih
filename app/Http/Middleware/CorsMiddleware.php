<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
    
        // Set CORS headers untuk gambar
        if ($request->is('img/*')) {
            $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:51865');
            $response->headers->set('Access-Control-Allow-Methods', 'GET');
        }
    
        return $response;
    }
    
}
