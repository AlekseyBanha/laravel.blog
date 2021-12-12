<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $posts = Post::with('category')->orderBy('id', 'desc')->paginate(2);
            return view('posts.index', compact('posts'));
        } else {
            return redirect()->route('register.create');
        }

    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->view += 1;
        $post->update();
        return view('posts.show', compact('post'));
    }
}
