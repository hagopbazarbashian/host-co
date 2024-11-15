<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transfer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use ZipArchive;
use Auth;


class transferInfoController extends Controller
{
    public function store(Request $request)
    {
     // Check if the request has files
    if ($request->hasFile('upload')) {
        $totalSize = 0; 

        // Calculate the total file size of the uploaded files
        foreach ($request->file('upload') as $file) {
            $totalSize += $file->getSize();
        }

        // // Set size limits
        $maxSize = auth()->check() 
            ? 10 * 1024 * 1024 * 1024 // 10GB for logged-in users
            : 500 * 1024 * 1024;      // 500MB for guests

        // Check if total size exceeds the limit
        if ($totalSize > $maxSize) {
            // Return with error if size exceeds limit
            $message = auth()->check() 
                ? 'Your upload exceeds the 10 GB limit.' 
                : 'Your upload exceeds the 500 MB limit. Please log in to upload up to 10 GB.';
            
            return redirect()->back()->withErrors(['upload' => $message]);
        }

        // Proceed with the rest of the upload logic
        $zip = new ZipArchive;
        $zipFileName = 'uploads_' . uniqid() . '.zip';
        $zipFilePath = storage_path('app/public/uploads/' . $zipFileName);

        // Create directory if not exists
        if (!file_exists(storage_path('app/public/uploads'))) {
            mkdir(storage_path('app/public/uploads'), 0755, true);
        }

        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            foreach ($request->file('upload') as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->store('uploads', 'public');
                $zip->addFile(storage_path('app/public/' . $filePath), $fileName);
            }
            $zip->close();

            // Generate a unique link for the zip file
            $uniqueLink = uniqid('file_', true);

            // Store the information in the database
            $data = [
                'user_session' => session()->getId(),
                'file_path' => 'uploads/' . $zipFileName,
                'delete_time' => now()->addHour(), // Set to delete after 1 hour
                'uniq_link' => $uniqueLink,
                'user_id' => auth()->check() ? auth()->user()->id : null, // Handle guests
            ];

            // Save the data to the database (replace with your actual model)
            transfer::create($data);

            // Generate the download link for the zip file
            $zipDownloadLink = asset('storage/uploads/' . $zipFileName);

            // Send an email with the link to the zip file if email is provided
            $userEmail = $request->input('email');
            if ($userEmail) {
                try {
                    Mail::send('emails.uploaded', ['downloadLink' => $zipDownloadLink], function ($message) use ($userEmail) {
                        $message->to($userEmail)
                                ->subject('Your uploaded files');
                    });
                } catch (\Exception $e) {
                    // Handle email sending failure
                    return redirect()->back()->with('error', 'File uploaded, but failed to send email.');
                }
            }

            // Return with a success message and the unique link to the zip file
            return redirect()->back()->with('success', 'File or image uploaded successfully.')
                                 ->with('link', $zipDownloadLink);
        } else {
            return redirect()->back()->with('error', 'Failed to create zip file.');
        }
    } else {
        return redirect()->back()->withErrors(['upload' => 'No files uploaded.']);
    }
    }
      
        public function downloaduser($uniqueLink)
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
