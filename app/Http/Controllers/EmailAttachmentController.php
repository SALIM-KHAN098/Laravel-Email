<?php

namespace App\Http\Controllers;

use App\Mail\EmailAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailAttachmentController extends Controller
{
    public function contactForm(){
        return view('contact');
    }

    public function sendContactEmail(Request $request){
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:5|max:100',
            'message' => 'required|min:10|max:255',
            'file' => 'required|mimes:pdf,doc,jpg,png,jpge,docx,xslx,xls|max:2048',
        ]);

        $fileName = time(). "." . $request->file('file')->extension();
        $request->file('file')->move('uploads', $fileName);

        $adminEmail = "salim.incredimate@gmail.com";
        $response = Mail::to($adminEmail)->send(new EmailAttachment($request->all(),$fileName));

        if($response){
            return back()->with('success', "The form submitted successfuly!!");
        }else{
            return back()->with('error', "Somthing error!!");
        }



    }
}
