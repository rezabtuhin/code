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
        return redirect('/dictionary')->with('title', auth()->user()['username'] . ' | Dictionary')->with('success', 'New item added to your dictionary!');
    }

    public function view_item(Dictionary $item)
    {
        if (auth()->user()->id !== $item['user_id']) {
            return view('view')->with('error', '404 Not Found')->with('title', '404 not found');
        }
        return view('view', ['dict' => $item])->with('title', $item['title'] . ' | Codersher');
    }

    public function delete(Dictionary $item)
    {
        if (auth()->user()->id === $item['user_id']) {
            $item->delete();
            return redirect('/dictionary')->with('success', 'Item deleted successfully!');
        }
    }
    public function edit(Dictionary $item)
    {
        if (auth()->user()->id !== $item['user_id']) {
            return view('view')->with('error', '404 Not Found')->with('title', '404 not found');
        }
        return view('dictEdit', ['dict' => $item])->with('title', $item['title'] . ' | Codersher');
    }
    public function update(Dictionary $item, Request $request)
    {
        if (auth()->user()->id !== $item['user_id']) {
            return redirect('/dictionary')->with('error', 'Something went wrong!');
        }
        $incommingField = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $item->update($incommingField);
        return redirect('/dictionary/view/' . $item['id'])->with('success', 'Item edited successfully!');
    }
}