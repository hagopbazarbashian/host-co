<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserControler extends Controller
{
     public  function index(){
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.show-all-users',compact('users'));

     }
}
     