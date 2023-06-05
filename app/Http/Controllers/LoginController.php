<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class LoginController extends Controller
{
    public function getPage()
    {
        if (Auth::check()) {
            return redirect('/')->with('title', 'Codersher | Home');
        } else {
            return view('login')->with('title', 'Codersher | Login');
        }
    }

    public function login(Request $request)
    {
        $incommingField = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['username' => $incommingField['username'], 'password' => $incommingField['password']])) {
            $request->session()->regenerate();
            return redirect('/')->with('title', 'Codersher | Home');

        }
        return back()->withErrors([
            'username' => "Username or password didn't match",
        ])->onlyInput('username')->with('title', 'Codersher | Login');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/login')->with('title', 'Codersher | Login');
    }
}