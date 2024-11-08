<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Str;
use Hash; 
use Auth;

class LoginController extends Controller
{
    public function index(){
        return  view('login');  
    }


    public function loginsumbit(LoginRequest $request)
{
    $credentials = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (Auth::guard('web')->attempt($credentials)) {
        $user = Auth::guard('web')->user();

        // Store IP address and generate an API token
        $user->ip_address = $request->ip();

        // Set an API token if it doesn't exist
        if (!$user->api_token) {
            $user->api_token = Str::random(60);
        }
        $user->save();

        // Save user login state in the session
        session(['user_logged_in' => true, 'user_id' => $user->id]);
    
        // Check if this is an API request (you could also check headers or route)
        if ($request->is_api) {
            // Return token for API use
            return response()->json([
                'token' => $user->api_token,  
                'is_admin' => $user->is_admin,
            ]);
        }

        // Standard web-based login behavior (redirect)
        if ($user->is_admin == 1) {
            return redirect()->route('admin_panel');
        }
        return redirect()->route('user_home',['api_token'=>$user->api_token]);

    } else {
        return redirect()->back()->with('error', 'Information is not correct!');
    }
}


     // Helper method to detect if request is from a mobile device
      private function isMobile(Request $request)
      {
          return preg_match('/(android|iphone|ipad|ipod|windows phone)/i', $request->header('User-Agent'));
      }
}
