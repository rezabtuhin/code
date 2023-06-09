<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProblemController extends Controller
{
    public function getPage()
    {
        if (Auth::check()) {
            return view('create_new')->with('title', 'Create new | Codersher');
        }
        return redirect('/login')->withErrors([
            'username' => "You must login first",
        ])->with('title', 'Codersher | Login');
    }

    public function createNew(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'difficulty' => 'required',
            'description' => 'required',
            'memory_limit' => 'required',
            'time_limit' => 'required',
            'tags' => 'required',
            'sample_test_count' => 'required',
            'test_cases' => 'required|file',
        ]);

        $testCases = json_decode(file_get_contents($request->file('test_cases')->getPathname()), true);
        $validatedData['user_id'] = auth()->id();
        $validatedData['test_cases'] = $testCases;
        $validatedData['publish'] = 0;
        Problem::create($validatedData);
        return redirect('/contribution')->with('title', 'Home | Codersher | Login');
    }
}