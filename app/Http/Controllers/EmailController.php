<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(){
        $toEmail = "salim.incredimate@gmail.com"; //client email to send welcome message
        $userEmail = "salim9781110274@gmail.com";
        $message = "Hello welcome to the webiste!";
        $subject = "Welcome to the SALIM KHAN!!!";
        $details = [
            'product_name' => "Man hat",
            'product_count' => "1 count",
            'product_number' => 3,
        ];


           $request =  Mail::to($toEmail)->cc($userEmail)->send(new welcomeemail($message, $subject, $details));

           dd($request);



        //    if you want to add multiple email
        // $emails = [
        //     'user1@gmail.com',
        //     'user1@gmail.com',
        //     'user1@gmail.com',
        // ];

        // foreach ($emails as $recipient){
        //     Mail::to($recipient)->send(new welcomeemail($message, $subject));
        // }

    }


}
