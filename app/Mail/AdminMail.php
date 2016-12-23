<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;
    public $body;
    public $subject;
    public $fromEmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fromEmail, $subject, $body)
    {
        $this->fromEmail = $fromEmail;
        $this->body = $body;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from($this->fromEmail)
                    ->subject($this->subject)
                    ->view('emails.mail');
    }
}
