<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Verify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $verification_url = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public User $user,
        public Verify $verify
    ) {
        $origin = $verify->origin;
        $idx64 = base64_encode($user->id);
        $token = $verify->verify_token;
        $this->verification_url = "$origin/auth/verify/$idx64/$token";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.auth.verify');
    }
}
