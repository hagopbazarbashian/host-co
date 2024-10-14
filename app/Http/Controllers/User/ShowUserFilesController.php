<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transfer;


class ShowUserFilesController extends Controller
{
     public function index($id){
         $transfers = transfer::where('user_id' , $id)->get();
         return view('show_your_files',compact('transfers'));
     }
}
   