<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ContributionEditController extends Controller
{
    public function getPage(Problem $item){
        if (auth()->user()->id !== $item['user_id']) {
            return view('contribEdit')->with('error', 'You are not authorized')->with('title', 'Error');
        }
        return view('contribEdit', ['dict' => $item])->with('title', $item['title'] . ' | Codersher'); 
    }
}
