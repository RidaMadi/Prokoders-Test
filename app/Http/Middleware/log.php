<?php

namespace App\Http\Middleware;

use App\Http\Controllers\ObserverPattern\UserLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Tymon\JWTAuth\Facades\JWTAuth;

class log
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle($request, Closure $next)
    {
        $log = new \App\Http\Controllers\ObserverPattern\Log();
        $userLog = new UserLog($log);
        $user = Auth();

        $data = array(
            'user_id' => $user->id,
            'page_url' => URL::current(),
        );

        $log->setState($data);
        return $next($request);
    }
}
