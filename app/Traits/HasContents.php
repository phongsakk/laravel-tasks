<?php

namespace App\Traits;

use App\Models\Content;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasContents {
  /**
   * Get all of the contents for the HasContents
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function contents(): HasMany
  {
      return $this->hasMany(Content::class);
  }
}