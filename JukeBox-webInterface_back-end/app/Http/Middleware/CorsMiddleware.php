<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $this->addCorsHeaders($response);

        return $response;
    }

    protected function handlePreflight($request)
    {
        // Add CORS headers for preflight request
        $response = response('', 200);

        $this->addCorsHeaders($response);

        return $response;
    }

    protected function addCorsHeaders($response)
    {
        $allowedOrigins = config('cors.allowed_origins', []);
        $allowedMethods = config('cors.allowed_methods', []);
        $allowedHeaders = config('cors.allowed_headers', []);
        $exposedHeaders = config('cors.exposed_headers', []);
        $maxAge = config('cors.max_age', 0);
        $supportsCredentials = config('cors.supports_credentials', false);

        $response->header('Access-Control-Allow-Origin', implode(', ', $allowedOrigins));
        $response->header('Access-Control-Allow-Methods', implode(', ', $allowedMethods));
        $response->header('Access-Control-Allow-Headers', implode(', ', $allowedHeaders));
        $response->header('Access-Control-Expose-Headers', implode(', ', $exposedHeaders));
        $response->header('Access-Control-Max-Age', $maxAge);
        $response->header('Access-Control-Allow-Credentials', $supportsCredentials);

        return $response;
    }
}
