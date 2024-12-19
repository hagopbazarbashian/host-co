<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\storegsystem;

class StorageSyetem extends Controller
{
    // Upload files with a password
    public function upload(Request $request)
    {
        \Log::info('Upload request received', $request->all()); // Log incoming request data
    
        // Validate files and password
        $request->validate([
            'files.*' => 'required|file|max:2048000', // Max 2GB per file
            'password' => [
                'required',
                'string',
                'min:8', // Minimum length of 8
                'regex:/[A-Z]/', // At least one uppercase letter
                'regex:/[a-z]/', // At least one lowercase letter
                'regex:/[0-9]/', // At least one number
                'regex:/[@$!%*?&]/', // At least one special character
            ],
        ], [
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ]);
    
        $password = bcrypt($request->input('password')); // Secure the password
        $uploadedFiles = $request->file('files');
        $responseFiles = [];
    
        foreach ($uploadedFiles as $file) {
            try {
                $path = $file->store('uploads', 'public');
                $fileEntry = storegsystem::create([
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'type' => $file->getMimeType(),
                    'size' => $file->getSize(),
                    'is_image' => str_starts_with($file->getMimeType(), 'image/'),
                    'password' => $password,
                ]);
    
                $responseFiles[] = [
                    'id' => $fileEntry->id,
                    'name' => $fileEntry->name,
                    'path' => $fileEntry->path,
                    'is_image' => $fileEntry->is_image,
                ];
            } catch (\Exception $e) {
                \Log::error('File upload error: ' . $e->getMessage());
                return response()->json(['error' => 'File upload failed.'], 500);
            }
        }
    
        return response()->json(['files' => $responseFiles, 'succes' => 'Files uploaded successfully!']);
    }
    


    public function showFiles(Request $request)
    {
        $request->validate(['password' => 'required|string|min:4']);
        $password = $request->input('password');

        $files = storegsystem::whereRaw('BINARY password = ?', [bcrypt($password)])->get();

        if ($files->isEmpty()) {
            return response()->json(['error' => 'Invalid password. No files found.'], 403);
        }

        return response()->json(['files' => $files]);
    }


    // Download file
    public function download($id)
    {
        $file = storegsystem::findOrFail($id);
        return Storage::download('public/' . $file->path, $file->name);
    }

    // Delete file
    public function delete(Request $request)
    {
        // Validate the incoming request to ensure 'id' is provided
        $request->validate([
            'id' => 'required|integer'
        ]);

        // Find the file entry in the database
        $file = storegsystem::findOrFail($request->input('id'));

        try {
            // Delete the file from storage
            Storage::delete('public/' . $file->path);

            // Delete the file entry from the database
            $file->delete();

            // Optionally fetch the remaining files to return to the client
            $remainingFiles = storegsystem::all();

            // Return a success response with updated file list
            return response()->json([
                'message' => 'File deleted successfully!',
                'files' => $remainingFiles // Return the updated list of files
            ]);
        } catch (\Exception $e) {
            // Handle exceptions and return an error response
            return response()->json([
                'error' => 'Failed to delete the file.',
                'details' => $e->getMessage()
            ], 500);
        }
    }



    public function verifyPassword(Request $request)
{
    $request->validate(['password' => 'required|string|min:4']);
    $password = $request->input('password');

    $files = storegsystem::all()->filter(function ($file) use ($password) {
        return password_verify($password, $file->password);
    });

    if ($files->isEmpty()) {
        return response()->json(['error' => 'Invalid password. No files found.'], 403);
    }

    return response()->json(['files' => $files]);
}


}
  