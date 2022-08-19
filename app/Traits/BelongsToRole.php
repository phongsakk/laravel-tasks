<?php

namespace App\Traits;

use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToRole
{
  /**
   * Get the role that owns the BelongsToRole
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function role(): BelongsTo
  {
    return $this->belongsTo(Role::class);
  }
}
