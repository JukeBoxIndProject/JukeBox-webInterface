<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->isMethod('OPTIONS')) {
            // For preflight requests
            return response()
                ->make('')
                ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization')
                ->header('Content-Type', 'text/plain');
        }

        // For actual requests
        $response = $next($request);

        // Check if the response is a string
        if (is_string($response)) {
            // If it's a string, create a response with the string content
            $response = response($response);
        }

        return $response
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }
}
