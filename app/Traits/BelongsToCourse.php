<?php 

namespace App\Traits;

use App\Models\Course;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToCourse {
  /**
   * Get the course that owns the BelongsToCourse
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function course(): BelongsTo
  {
      return $this->belongsTo(Course::class);
  }
}