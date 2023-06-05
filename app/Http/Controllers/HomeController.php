<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class HomeController extends Controller
{
    public function getPage()
    {
        if (Auth::check()) {
            $users = DB::table('posts')->get();
            return view('home')->with('title', 'Codersher | Home');
        } else {
            return redirect('/login')->with('title', 'Codersher | Login');
        }
    }

    public function post(Request $request)
    {
        $incommingField = $request->validate([
            'body' => 'required',
        ]);
        $incommingField['user_id'] = auth()->id();
        Post::create($incommingField);

        return redirect('/')->with('title', 'Codersher | Home');
    }
    public function uploadiamge(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('media'), $fileName);
            $url = assert('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'url' => $url, 'uploaded' => true]);
        }
    }
}