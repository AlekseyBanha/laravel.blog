<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSearch;
use App\Models\Post;
use App\Models\Subscriber;
use App\Mail\LaravelBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendController extends Controller
{
    public function index(Request $request)
    {
        $check = $request->validate([
            'email' => 'required|email|unique:subscribers'
        ]);
        if ($check) {
            Subscriber::create($request->all());
        } else {
            return redirect()->route('home');
        }
        return redirect()->route('home')->with('success', 'Subscribed');

    }
    public function sendMessageMail(Request $request)
    {
        $body = '<p>Hello:' . Auth::user()->name . '.</p><br>';
        $body .= 'The post you liked:';
        $body .= 'http://laravel.blog/article/' . $request->slug . '<br>';
        $body .= 'Thank you for being with us)';
        Mail::to(Auth::user()->email)->send(new LaravelBlog($body));
        return redirect()->back()->with('success', 'Message send');
    }


}
