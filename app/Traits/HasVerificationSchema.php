<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Verify;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasVerificationSchema
{
  /**
   * Get the verify_token associated with the HasVerifyToken
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function verificationSchema(): HasOne
  {
    return $this->hasOne(Verify::class);
  }

  public function isVerified()
  {
    return !!$this->email_verified_at;
  }

  static function findByEmail(string $email)
  {
    return User::where('email', $email)->first();
  }
}
