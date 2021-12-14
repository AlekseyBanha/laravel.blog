<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        Comment::create([
            'Name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'text' => $request->text,
            'post_id' => $request->post_id,
        ]);
        return redirect()->back();
    }

    public function show($slug)
    {
        /* $post = Post::where('slug', $slug)->with('comments')->firstOrFail();
         $post->view += 1;
         $post->update();
         return view('posts.show', compact('post'));*/
    }
}
