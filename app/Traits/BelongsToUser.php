<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToUser
{
	/**
	 * Get the users that owns the BelongsToUser
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function author(): BelongsTo
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
}
