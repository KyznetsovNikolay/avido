<?php

namespace App\Mail\Auth;

use App\Models\User\User;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyMail extends Mailable
{
    use SerializesModels;

    /**
     * @var User
     */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return $this
     */
    public function build(): VerifyMail
    {
        return $this
            ->subject('Signup Confirmation')
            ->markdown('mail.auth.register.confirm');
    }
}
