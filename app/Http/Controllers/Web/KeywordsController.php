<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KeywordsController extends Controller
{
    public function index()
    {
        $data['keywords'] = Keyword::all();
        return view('Admin.keywords',$data);
    }
}
