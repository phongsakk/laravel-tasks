<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use App\Traits\HasContents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory,
        BelongsToUser,
        HasContents;

    protected $fillable = [
        'name',
        'description',
        'price',
        "user_id"
    ];

    function isOwned()
    {
        return $this->user_id === auth()->id();
    }
}
