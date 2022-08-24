<?php

namespace App\Traits;

use App\Models\Course;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasCourses
{
  /**
   * Get all of the courses for the HasCreatedCourse
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function createdCourses(): HasMany
  {
    return $this->hasMany(Course::class);
  }
}
