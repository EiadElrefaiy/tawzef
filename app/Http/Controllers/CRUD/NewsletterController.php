<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;

use App\Mail\NewsletterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function sendEmails(Request $request)
    {
        $validated = $request->validate([
            'emails' => 'required|array',
            'emails.*' => 'email', // Validate each email in the array
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
    
        $emails = $validated['emails'];
        $subject = $validated['subject'];
        $message = $validated['message'];
    
        foreach ($emails as $email) {
            Mail::to($email)->send(new NewsletterMail($subject, $message));
        }
    
        return response()->json(['status' => true, 'message' => 'Emails successfully sent!']);
    }
}
