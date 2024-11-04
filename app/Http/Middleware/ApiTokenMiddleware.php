<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class ApiTokenMiddleware
{
    public function handle($request, Closure $next)
    {
        // Retrieve the token from the query parameter
        $token = $request->query('api_token');
        dd($token);

        // Validate the token by checking the users table
        $user = User::where('api_token', $token)->first();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Attach the user to the request for further use
        $request->attributes->set('user', $user);

        return $next($request);
    }
    

}
