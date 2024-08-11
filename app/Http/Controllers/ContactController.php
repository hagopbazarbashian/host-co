<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendContact(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $email = $request->input('email');
        $message = $request->input('message');

        // Send email
        Mail::raw($message, function ($mail) use ($email) {
            $mail->to('hagopbazarbasian@gmail.com') // Replace with your email address
                ->from($email)
                ->subject('Contact Form Submission');
        });

        return back()->with('success', 'Thank you for your message. We will get back to you soon.');
    }
}
