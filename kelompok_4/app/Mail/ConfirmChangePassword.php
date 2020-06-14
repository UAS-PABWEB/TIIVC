<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmChangePassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var User
     */
    public $user, $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@catut.com', env('MAIL_FROM_NAME'))
                    ->view('backend.mail.confirm_change_password');
    }
}
