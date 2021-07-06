<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckGoLoginPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->back();
        } elseif (Auth::guard('user')->check()) {
            return redirect()->back();
        } else {
            return $next($request);
        }
    }
}
