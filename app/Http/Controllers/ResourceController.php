<?php

namespace App\Http\Controllers;

use App\Models\Prefix;

class ResourceController extends Controller
{
    public function prefixes()
    {
        return Prefix::all();
    }
}
