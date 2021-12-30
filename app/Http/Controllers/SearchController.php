<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSearch;
use App\Models\Post;

class SearchController extends Controller
{
    public function index(StoreSearch $request)
    {
        $s = $request->s;
        $posts = Post::where('title', 'LIKE', "%{$s}%")
            ->orWhere('description', 'LIKE', "%{$s}%")
            ->with('category')
            ->paginate(2);
        return view('posts.search', compact('posts', 's'));
    }
}

