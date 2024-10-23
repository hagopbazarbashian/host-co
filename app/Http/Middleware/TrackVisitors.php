<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class TrackVisitors
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
        if ($request->is('/')) {  // Checks if the request is for the root URL
            $ip = $request->ip();

            // Check if the IP address has already been logged
            $existingVisitor = Visitor::where('ip_address', $ip)->first();
            if (!$existingVisitor) {
                Visitor::create(['ip_address' => $ip]);
            }
        }

        return $next($request);
    }
}
         