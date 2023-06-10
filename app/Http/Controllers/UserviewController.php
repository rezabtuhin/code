<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class UserviewController extends Controller
{
    public function getPage(Problem $item)
    {
        if (auth()->user()->id !== $item['user_id']) {
            return view('contributionUserView')->with('error', 'You are not authorized!');
        }
        return view('contributionUserView', ['item' => $item])->with('title', $item['title'] . ' | Restricted View');
    }

    public function delete(Problem $item)
    {
        if (auth()->user()->id === $item['user_id']) {
            $item->delete();
            return redirect('/contribution')->with('success', 'Item deleted successfully!')->with('title', auth()->user()['username'] . ' | Contribution');
        }
        return redirect('/contribution')->with('error', 'You are not authorized')->with('title', auth()->user()['username'] . ' | Contribution');
    }
}