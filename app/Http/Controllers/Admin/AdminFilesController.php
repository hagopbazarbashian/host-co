<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transfer;
use Illuminate\Support\Facades\Storage;

class AdminFilesController extends Controller
{
     public function index(){
        $transfers = transfer::get();
        return view('admin.show-all-downlod-files',compact('transfers'));
     }


      public  function  removefiles($id){
        $transfer = transfer::find($id);
        if ($transfer) {   
            // Assuming 'file_path' is the column where your file's path or name is stored
            $filePath = $transfer->file_path;
    
            // Check if file exists and delete it from storage
            if (Storage::exists('uploads/' . $filePath)) {
                Storage::delete('uploads/' . $filePath); 
            }
    
            // Delete the transfer record from database
            $transfer->delete();
    
            return back()->with('success', 'File and record deleted successfully.');
        }
    
        return back()->with('error', 'File not found.');
      }
}
   