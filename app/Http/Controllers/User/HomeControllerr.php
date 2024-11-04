<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class HomeControllerr extends Controller
{
     public function index(Request $request){
        // Retrieve the token from the request
        $token = $request->query('api_token') ?? $request->header('Authorization');

        // Find the user with this token
        $user = User::where('api_token', $token)->first();

        // If the token is valid, allow access; otherwise, return Unauthorized
        if ($user) {
            // Continue with the authenticated user's request
            return view('user-home', ['user' => $user]);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
     }
}
   