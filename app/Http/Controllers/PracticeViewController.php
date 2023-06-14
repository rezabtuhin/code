<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PracticeViewController extends Controller
{
    public function getPage($uuid)
    {
        if (Auth::check()) {
            $problem = Problem::where('uuid', $uuid)->first();
            if ($problem) {
                return view('practiceView', ['lists' => $problem])->with('title', $problem->title . ' | Codersher');
            } else {
                return redirect('/practice')->with('error', 'Problem not found.');
            }
        }
        return redirect('/login')->withErrors([
            'username' => "You must login first",
        ])->with('title', 'Codersher | Login');
    }
}