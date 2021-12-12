<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSearch;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Http\Request;

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
}
