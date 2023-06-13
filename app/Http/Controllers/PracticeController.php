<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PracticeController extends Controller
{
    public function getPage()
    {
        if (Auth::check()) {
            $problems = Problem::sortable()->paginate(20);
            // $problems = DB::table('problems')->where('publish', 1)->latest()->paginate(20);
            return view('practicelist', ['lists' => $problems])->with('title', 'Practice list | Codersher');
        }
        return redirect('/login')->withErrors([
            'username' => "You must login first",
        ])->with('title', 'Codersher | Login');
    }
}