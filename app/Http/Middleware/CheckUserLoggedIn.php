<?php

namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckUserLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (session('user_logged_in') && Auth::check()) {
            return $next($request);
        }

        // Redirect to login if the session or Auth is not set
        return redirect()->route('free_trial')->with('error', 'Please log in to access this page.');
    }
}
  