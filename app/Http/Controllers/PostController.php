<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    public function index()
    {


        $posts = Post::with('category')->orderBy('id', 'desc')->paginate(2);
        return view('posts.index', compact('posts'));


    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with('comments')->firstOrFail();
        $post->view += 1;
        $post->update();
        $pagine = $post->comments()->paginate(7);
        /*   $url = $_SERVER['REQUEST_URI'];*/
        return view('posts.show', compact('post','pagine' ));
    }
}
