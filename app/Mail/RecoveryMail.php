<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoveryMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $password_reset;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password_reset, $user)
    {
        //
        $this->user=$user;
        $this->password_reset=$password_reset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@talkflip.co')->markdown('Mail.Recovery');
    }
}
