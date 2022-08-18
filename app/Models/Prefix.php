<?php

namespace App\Models;

use App\Traits\HasUsers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefix extends Model
{
    use HasFactory, HasUsers;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'title_th',
        'title_en',
    ];
}
