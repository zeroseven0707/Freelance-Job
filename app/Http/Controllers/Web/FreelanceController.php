<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContentIdea;
use App\Models\Keyword;
use App\Models\User;
use Illuminate\Http\Request;

class FreelanceController extends Controller
{
    public function index()
    {
        $data['freelancers'] = User::where('role', 'freelance')
        ->withCount(['keyword', 'content'])
        ->get();
        return view('Admin.freelancers',$data);
    }
    public function detail_keywords($id)
    {
        $data['keywords'] = Keyword::where('freelance_id',$id)->get();
        $data['user'] = User::where('id',$id)->first();
        return view('Admin.monitoring.keywords',$data);
    }
    public function detail_content($id)
    {
        $data['user'] = User::where('id',$id)->first();
        $data['content'] = ContentIdea::where('freelance_id',$id)->get();
        return view('Admin.monitoring.content-ideas',$data);
    }
}
