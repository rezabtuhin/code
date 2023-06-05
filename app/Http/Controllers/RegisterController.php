<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function getPage()
    {
        if (Auth::check()) {
            return redirect('/')->with('title', 'Codersher | Home');
        } else {
            return view('register')->with('title', 'Codersher | Register');
        }
    }

    public function register(Request $request)
    {
        $incomingField = $request->validate([
            'username' => ['required', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'gender' => ['required'],
            'password' => ['required', 'min:8'],
            'confirm_password' => ['required', 'same:password'],
        ]);
        $incomingField['password'] = bcrypt($incomingField['password']);
        $user = User::create($incomingField);
        return redirect('/login')->with('title', 'Codersher | Login');
    }
}