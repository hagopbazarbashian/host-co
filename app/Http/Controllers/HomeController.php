<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index(){
        session(['visited_welcome' => true]); 
        
        if (Auth::user()) {
            return redirect()->route('user_home');
        }
        return view('welcome');
    }
}
      