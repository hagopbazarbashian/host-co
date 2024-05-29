<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transfer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Carbon\Carbon;

class transferInfoforuserloginController extends Controller
{
    public function storeuser(Request $request)
    {

        $request->validate([
           'email'=>'required | email'
        ]);
        
        // Check if the request has files
        if ($request->hasFile('upload')) {
            $zip = new ZipArchive;
            $zipFileName = 'uploads_' . uniqid() . '.zip';
            $zipFilePath = storage_path('app/public/uploads/' . $zipFileName);

            if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
                foreach ($request->file('upload') as $file) {
                    $fileName = $file->getClientOriginalName();
                    $filePath = $file->store('uploads', 'public');
                    $zip->addFile(storage_path('app/public/' . $filePath), $fileName);

                    // Generate a unique link for each file
                    $uniqueLink = uniqid('file_', true);

                    // Store the information in the database
                    $data = [
                        'user_session' => session()->getId(),
                        'file_path' => $filePath,
                        'delete_time' => now()->addHour(), // Set to delete after 1 hour
                        'uniq_link' => $uniqueLink,
                    ];

                    // Save the data to the database (replace with your actual model)
                    transfer::create($data);
                }
                $zip->close();

                // Send an email with the link to the zip file
                $userEmail = $request->input('email');
                $zipDownloadLink = asset('storage/uploads/' . $zipFileName);

                Mail::send('emails.uploaded', ['downloadLink' => $zipDownloadLink], function($message) use ($userEmail) {
                    $message->to($userEmail)
                    ->subject('Your uploaded files');
                });

                // Return with a success message
                return redirect()->back()->with('success', 'Files uploaded and email sent successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to create zip file.');
            }
        } else {
            return redirect()->back()->with('error', 'No files uploaded.');
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
