<?php

/*
|--------------------------------------------------------------------------
| LICENSE
|--------------------------------------------------------------------------
| Code that written below is belong to Zain Alwan Wima Irfani. You may
| not use, share, modify, and study without the author's permission
| (zainalwan4@gmail.com).
*/

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountRecovery extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $password_reset_token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $password_reset_token)
    {
        $this->name = $name;
        $this->password_reset_token = $password_reset_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Account Recovery')
                    ->view('emails.account_recovery');
    }
}
