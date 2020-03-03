<?php

namespace LaPress\WordPress\Routing\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class XmlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->header('Content-Type', 'application/xml');

        return $response;
    }
}
