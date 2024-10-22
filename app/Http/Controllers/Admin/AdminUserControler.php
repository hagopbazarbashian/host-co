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


     public function removeuser($id){
        $User = User::find($id);
        $User->delete();
        return redirect()->back()->with('success', 'Deleted successful!');
     }
}
     