<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

/**
 * Middleware om te tracken welke gebruiker online is en welke niet. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Http\Middleware
 */
class LogLastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $expiresAt = now()->addMinutes(5); 
            Cache::put('user-is-online-' . auth()->user()->id, true, $expiresAt);
        }

        return $next($request);
    }
}
