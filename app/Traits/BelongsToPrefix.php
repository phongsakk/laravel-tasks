<?php

namespace App\Traits;

use App\Models\Prefix;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToPrefix
{
  /**
   * Get the prefix that owns the BelongsToPrefix
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function prefix(): BelongsTo
  {
    return $this->belongsTo(Prefix::class);
  }
}
