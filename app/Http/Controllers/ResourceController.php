<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Prefix;

class ResourceController extends Controller
{
    public function prefixes()
    {
        return Prefix::all();
    }

    public function courses()
    {
        return Course::with(['contents', 'user'])->get();
    }
}
