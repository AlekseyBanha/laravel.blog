<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DebugBar\DebugBar;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        return view('admin.index');
    }
}
