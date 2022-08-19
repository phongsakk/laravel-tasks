<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasUsers
{
	/**
	 * Get all of the users in thefor the HasUsers
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function users(): HasMany
	{
		return $this->hasMany(User::class);
	}
}
