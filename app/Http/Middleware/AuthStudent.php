<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role != 'student') {
            return redirect()->route('dashboard')->with('message', 'You are not authorized to access this page');
        }
        return $next($request);
    }
}
