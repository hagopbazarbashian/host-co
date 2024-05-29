<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Http\Requests\RegisterRequest;
use Hash; 
use Auth;


class RegisterController extends Controller
{
    public function index(){
         return view('register');
    }


    public function registersumbit(RegisterRequest $request){

        $user = User::where('email', $request->input('email'))->first();

        if ($user) {
            // Email already exists
            return redirect()->back()->with('error', 'You already have this email');
        }
  
        $hashedPassword = Hash::make($request->input('password'));
        $token = hash('sha256', time());

        $use = User::create([
            'name' => $request->input('name'),
            'Phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
            'token'=>$token,
        ]);
        
        return redirect()->route('free_trial')->with('success', 'Registration successful!');

     }
}
