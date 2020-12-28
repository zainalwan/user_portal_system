<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email_verification_token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email_verification_token)
    {
        $this->name = $name;
        $this->email_verification_token = $email_verification_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Email Verification')
                    ->view('emails.email_verification');
    }
}
