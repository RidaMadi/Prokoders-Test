<?php

namespace App\Http\Middleware;

use App\Traits\GeneralTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckRole
{
    use GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if($guard != null){
            $user=Auth();
            if($guard=='admin-api')
            {
                if($user->role == 1) {
                    return $next($request);
                }
                else
                {
                    return  $this -> returnError(403,'Not Allowed');
                }
            }
            elseif ($guard=='user-api')
            {
                if($user->role==2) {
                    return $next($request);
                }
                else
                {
                    return  $this -> returnError(403,'Not Allowed');
                }
            }
        }
        return $next($request);
    }
}
