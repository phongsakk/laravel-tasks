<?php

namespace App\Models;

use App\Traits\BelongsToCourse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory,
        BelongsToCourse;

    protected $fillable = [
        "course_id",
        "title",
        "description",
        "order",
        "is_media",
        "article",
    ];
}
