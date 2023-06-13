<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ContributionEditController extends Controller
{
    public function getPage(Problem $item)
    {
        if (auth()->user()->id !== $item['user_id']) {
            return view('contribEdit')->with('error', 'You are not authorized')->with('title', 'Error');
        }
        return view('contribEdit', ['dict' => $item])->with('title', $item['title'] . ' | Codersher');
    }

    public function update(Problem $item, Request $request)
    {
        if (auth()->user()->id !== $item['user_id']) {
            return redirect('/contribution')->with('error', 'Something went wrong!');
        }
        $validatedData = $request->validate([
            'title' => 'required',
            'difficulty' => 'required',
            'description' => 'required',
            'memory_limit' => 'required',
            'time_limit' => 'required',
            'tags' => 'required',
            'sample_test_count' => 'required',
            'test_cases' => 'required',
        ]);
        $input = stripslashes($request->test_cases);
        $input = stripslashes($input);
        $input = trim($input, '"');
        $input = str_replace('\\r\\n', "\r\n", $input);
        $input = str_replace('\\t', "\t", $input);
        $data = json_decode($input, true);
        $formattedJson = json_encode($data, JSON_PRETTY_PRINT);
        $validatedData['test_cases'] = $formattedJson;
        $item->update($validatedData);
        return redirect('/contribution/userview/' . $item['id'])->with('success', 'Item edited successfully!');


    }
}