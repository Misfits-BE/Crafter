<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

/**
 * Vermijd dat geblokkeerde gebruikers toch dingen kunnen wijzigen in de applicatie. 
 * 
 * @author  Anton Komarev <a.komarev@cybersog.su>
 * @license 2018 MIT License
 * @package \App\Http\Middleware
 */
class ForbidBannedUser
{
    /**
     * The Guard Implementation
     * 
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth; 

    /** 
     * ForbidBannedUser constructor 
     * 
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     * @return void
     */
    public function __constrcut(Guard $auth) 
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     * 
     * @throws \Exception
     * 
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $this->auth()->user();

        if ($user && $user->isBanned()) {
            auth()->logout();
            return view('errors.blocked');
        }

        return $next($request);
    }
}
