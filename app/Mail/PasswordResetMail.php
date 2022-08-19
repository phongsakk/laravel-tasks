<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $url = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public User $user,
        public string $origin
    ) {
        $cur_time = now();
        $cred = $user->email . '∑' . $cur_time . '∑' . $user->password;
        $cred_encode = base64_encode(base64_encode($cred));
        $this->url = "$origin/auth/password/reset/$cred_encode";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.auth.password_reset');
    }
}
