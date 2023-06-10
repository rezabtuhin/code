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
}