<?php

namespace Hitocean\LaravelAuth\User\User\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Hitocean\LaravelAuth\User\User\Models\User;

class SetInitialPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('User.User.Mail.set-initial-password')
                    ->subject('Nuevo registro')
                    ->to($this->user->email)
                    ->with('url', route('password.request'));
    }

}
