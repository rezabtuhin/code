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
        $file = $file = 'temp.txt';
        file_put_contents($file, json_encode(json_decode($request->test_cases, true), true));
        $fileData = file_get_contents($file);
        $validatedData['test_cases'] = json_decode($fileData, true);
        unlink($file);
        $item->update($validatedData);
        return redirect('/contribution/userview/' . $item['id'])->with('success', 'Item edited successfully!');


    }
}