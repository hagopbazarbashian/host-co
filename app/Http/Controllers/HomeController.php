<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        session(['visited_welcome' => true]); 
        return view('welcome');
    }
}
      