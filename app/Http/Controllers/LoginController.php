<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Http\Requests\LoginRequest;
use Hash; 
use Auth;

class LoginController extends Controller
{
    public function index(){
        return  view('login');  
    }


    public function loginsumbit(LoginRequest $request){  

        $credential = [   
            'email' => $request->email, 
            'password' => $request->password 
        ];

        if (Auth::guard('web')->attempt($credential)) {
          $user = Auth::guard('web')->user();  
          
          // Store IP address
          $user->ip_address = $request->ip();
          $user->save();

          if($user->is_admin == 1){
            return redirect()->route('admin_panel');
          }
          return redirect()->route('user_home');

        } else {
            return redirect()->back()->with('error', 'Information is not correct!');
        }
       
     }
}
