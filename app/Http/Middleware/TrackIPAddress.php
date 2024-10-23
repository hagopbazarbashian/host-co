<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrackIPAddress
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
        // Assuming user is authenticated
        if ($user = auth()->user()) {
            $user->ip_address = $request->ip();
            $user->save();
        }

        return $next($request);
    }
}
  