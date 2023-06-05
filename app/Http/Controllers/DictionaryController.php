<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DictionaryController extends Controller
{
    public function getPage()
    {
        if (Auth::check()) {
            $dicts = auth()->user()->usersCoolDict()->latest()->paginate(10);
            return view('dictionary', ['dicts' => $dicts])->with('title', auth()->user()['username'] . ' | Dictionary');
        }
        return redirect('/login')->withErrors([
            'username' => "You must login first",
        ])->with('title', 'Codersher | Login');
    }

    public function insert(Request $request)
    {
        $incommingField = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $incommingField['user_id'] = auth()->id();
        Dictionary::create($incommingField);
        return redirect('/dictionary')->with('title', auth()->username() . ' | Dictionary');
    }

    public function view_item(Dictionary $item)
    {
        if (auth()->user()->id !== $item['user_id']) {
            return view('view')->with('error', '404 Not Found')->with('title', '404 not found');
        }
        return view('view', ['dict' => $item])->with('title', $item['title'] . ' | Codersher');
    }
}