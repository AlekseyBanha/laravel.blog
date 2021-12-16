<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
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

        $comment = Comment::create([
            'Name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'text' => $request->text,
            'post_id' => $request->post_id,
        ]);
        return json_encode([
           'name' => $comment->Name,
           'text' => $comment->text,
           'email' => $comment->email,
           'created_at' => $comment->date,
        ]);

    }


}
