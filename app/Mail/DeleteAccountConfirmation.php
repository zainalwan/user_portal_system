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

class DeleteAccountConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $name;
    public $delete_account_token;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $delete_account_token)
    {
        $this->subject = 'DELETE ACCOUNT CONFIRMATION';
        $this->name = $name;
        $this->delete_account_token = $delete_account_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.delete_account_confirmation');
    }
}
