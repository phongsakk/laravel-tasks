<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Prefix;
use App\Models\User;

class ResourceController extends Controller
{
    public function prefixes()
    {
        return Prefix::all();
    }

    public function courses()
    {
        $searchText = request()->get('search');
        $searchQuery = '%' . $searchText . '%';
        $users = User::where('id', 'like', $searchQuery)
            ->orWhere('firstname', 'like', $searchQuery)
            ->orWhere('lastname', 'like', $searchQuery)
            ->get();
        $courses = Course::with(['author'])
        ->where('id', 'like', $searchQuery)
        ->orWhere('name', 'like', $searchQuery)
        ->orWhere('description', 'like', $searchQuery);
        if ($users->count() > 0) foreach ($users as $user) {
            $courses->orWhereBelongsTo($user,'author');
        }
        $courses = $courses->paginate(2);
        return response([
            'query' => $searchText,
            'paginate' => $courses,
        ]);
    }
}
