<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContentIdea;
use Illuminate\Http\Request;

class ContenIdeaController extends Controller
{
    public function index()
    {
        $data['content'] = ContentIdea::all();
        return view('Admin.content-ideas',$data);
    }
}
