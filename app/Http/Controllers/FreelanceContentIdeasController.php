<?php

namespace App\Http\Controllers;

use App\Imports\ContentIdeasImport;
use App\Models\ContentIdea;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FreelanceContentIdeasController extends Controller
{
    public function index()
    {
        $data['content'] = ContentIdea::where('freelance_id',auth()->user()->id)->get();
        return view('Freelance.content-ideas',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
            'language' => 'required|string',
        ]);

        $language = $request->input('language');

        Excel::import(new ContentIdeasImport($language), $request->file('file'));

        return back()->with('message','Content Ideas imported successfully');
    }
}
