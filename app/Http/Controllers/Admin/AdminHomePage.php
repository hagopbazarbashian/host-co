<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Visitor,transfer,User,LinkClick};

class AdminHomePage extends Controller
{
     public function index(){  
        $Visitor = Visitor::count();
        $transfer = transfer::count();
        $LinkClick = LinkClick::count();  
        $Users = User::get();
        return view('admin.index',compact('Visitor','transfer','Users','LinkClick'));
     }   
}
       