<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class ForbidBannedUser.
 *
 * @author      Anton Komarev
 * @copyright   2018 Anton Komarev
 * @package     Cog\Laravel\Ban\Http\Middleware
 */
class ForbidBannedUser
{
    /**
     * The Guard implementation.
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
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * 
     * @return mixed
     * 
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {
        $user = $this->auth->user();
        
        if ($user && $user->isBanned()) {
            return view('errors.blocked');
        }

        return $next($request);
    }
}
