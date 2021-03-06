<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(StoreUser $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        session()->flash('success', 'Регистрация пройдена');
        Auth::login($user);
        return redirect()->back();
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,

        ])) {
            session()->flash('success', 'Вы авторизованы');
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {

                return redirect()->back();
            }
        }

        return redirect()->back()->with('error', 'Неравильный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
