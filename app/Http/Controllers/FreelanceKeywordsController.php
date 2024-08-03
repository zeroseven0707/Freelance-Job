<?php

namespace App\Http\Controllers;

use App\Imports\KeywordsImport;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FreelanceKeywordsController extends Controller
{
    public function index()
    {
        $data['keywords'] = Keyword::where('freelance_id',auth()->user()->id)->get();
        return view('Freelance.keywords',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
            'language' => 'required|string'
        ]);
    
        $language = $request->input('language');
        Excel::import(new KeywordsImport($language), $request->file('file'));
    
        return back()->with('message', 'Content Ideas imported successfully');
    }
}
