<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transfer;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class transferInfoController extends Controller
{
     public function store(Request $request)
     {
         // Validate the incoming request
        
         // Handle file or image upload
         if ($request->hasFile('upload')) {
             $file = $request->file('upload');
             $uploadPath = $file->store('uploads', 'public');
 
             // Generate a unique link
             $uniqueLink = uniqid('file_', true);
 
             // Store the information in the database
             $data = [
                 'user_session' => session()->getId(),
                 'file_path' => $uploadPath,
                 'delete_time' => now()->addHour(), // Set to delete after 1 hour
                 'uniq_link' => $uniqueLink,
             ];
 
             transfer::create($data); // Replace with your actual model
 
             // Return with the unique link to show to the user
             return redirect()->back()->with('success', 'File or image uploaded successfully.')->with('link', url("/download/{$uniqueLink}"));
         }
 
         return redirect()->back()->with('error', 'File upload failed. Please try again.');
     }
 
     public function download($uniqueLink)
     {
         // Retrieve the file record from the database
         $file = transfer::where('uniq_link', $uniqueLink)->firstOrFail();
 
         // Check if the file exists in the storage
         if (Storage::disk('public')->exists($file->file_path)) {
             return Storage::disk('public')->download($file->file_path);
         }
 
         return abort(404);
     }
}
