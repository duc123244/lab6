<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckActive
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
        if (Auth::check() && !Auth::user()->active) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['Tài khoản đã bị vô hiệu hóa.']);
        }

        return $next($request);
    }
}
