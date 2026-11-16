<?php

namespace App\Http\Controllers;

use App\Mail\MailableContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController
{
    public function sendMail(Request $request)
    {
        $content = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|max:255",
            "subject" => "required|string|max:255",
            "submitted" => "required|string",
        ]);

        $mail = new MailableContact($content);
        Mail::to("davidkizajr@outlook.fr")->send($mail);

        return redirect()->route("contactsuccess");
    }
}
