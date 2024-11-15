<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transfer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdminFilesController extends Controller
{   
     public function index(){
        $transfers = transfer::get();
        return view('admin.show-all-downlod-files',compact('transfers'));
     }


     public function removefiles($id)
     {
      $transfer = transfer::find($id);
  
      if ($transfer) {
          // Temporarily hard-code the full path to directly test if it deletes correctly
          $fullPath = 'storage' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $transfer->file_path);

  
          Log::info('Attempting to delete file', ['full_path' => $fullPath]);
  
          // Use file_exists and unlink directly
          
          if (file_exists($fullPath)) {
              unlink($fullPath); // Delete the file directly
              $transfer->delete(); // Optionally delete the record from the database
  
              Log::info('File deleted successfully', ['file_path' => $fullPath]);
    
              return back()->with('success', 'ZIP file and record deleted successfully.');
          }
  
          Log::warning('File not found in storage', ['file_path' => $fullPath]);
  
          return back()->with('error', 'ZIP file not found.');
      }
  
      Log::error('Transfer record not found', ['id' => $id]);
  
      return back()->with('error', 'Record not found.');
  }
  
  }