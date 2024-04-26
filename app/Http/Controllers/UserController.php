<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(LoginRequest $req)
    {

        if (Auth::attempt([
            'email' => $req->email,
            'password' => $req->password,
        ])) {
            return redirect()->route('books.index');
        } else {
            return redirect()->route('login')->with('message', 'Wrong login or password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}

