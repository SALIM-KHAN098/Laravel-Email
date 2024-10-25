<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailAttachment extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    public $fileName;
    /**
     * Create a new message instance.
     */
    public function __construct($request, $fileName)
    {
        $this->request = $request;
        $this->fileName = $fileName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.Email-Attachment',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
       $file = [];
       if($this->fileName){
            $file =[
                Attachment::fromPath(public_path('uploads/'. $this->fileName)),
            ];
       }
       return $file;
    }
}
