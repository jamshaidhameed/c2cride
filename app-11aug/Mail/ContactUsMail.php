<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $name;
    public $email;
    public $phone;
    public $message;
    public $subject;
    public $attch_arr;
    public function __construct($subject,$message,$attch_arr)
    {
        //
        $this->message = $message;
        $this->subject = $subject;
        if (!empty($attch_arr) && count($attch_arr) > 0) {
            
            $this->attch_arr = $attch_arr;
        }
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // return new Content(
        //     view: 'view.name',
        // );

        return new Content(
             markdown: 'emails.contact_us',with:['subject' => $this->subject,'name' => $this->name,'email' => $this->email,'phone' => $this->phone,'message' => $this->message],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        if(!empty($this->attch_arr) && count($this->attch_arr) > 0 ){
           
            foreach ($this->attch_arr as $key => $value) {
                
                $attachments[] = Attachment::fromPath($value);
            }
          
            
        }
        return $attachments;
    }
}
