<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContributionController extends Controller
{
    public function getPage()
    {
        if (Auth::check()) {
            $problems = auth()->user()->userCoolProblems()->latest()->paginate(20);
            return view('contribution', ['prob' => $problems])->with('title', auth()->user()['username'] . ' | Contribution');
        }
        return redirect('/login')->withErrors([
            'username' => "You must login first",
        ])->with('title', 'Codersher | Login');
    }

    public function publish(Problem $item)
    {
        if (auth()->user()->id !== $item['user_id']) {
            return redirect('/contribution')->with('error', 'You are not authorized!');
        }
        $incommingField['publish'] = 1;
        $item->update($incommingField);
        return redirect('/contribution')->with('success', 'Prblem published successfully! It is now visible to other users.');
    }

    public function hide(Problem $item)
    {
        if (auth()->user()->id !== $item['user_id']) {
            return redirect('/contribution')->with('error', 'You are not authorized!');
        }
        $incommingField['publish'] = 0;
        $item->update($incommingField);
        return redirect('/contribution')->with('success', 'Prblem hidden successfully! It is now visible only to you.');
    }
}