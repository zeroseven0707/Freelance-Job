<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContentIdea;
use App\Models\Keyword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function admin()
    {
        $data['keywords'] = Keyword::count();
        $data['content'] = ContentIdea::count();
        $data['freelancers'] = User::where('role','freelance')->count();
        $data['user'] = auth()->user();
        return view('Admin.dashboard',$data);
    }
    public function freelance()
    {
        $data['keywords'] = Keyword::where('freelance_id',auth()->user()->id)->count();
        $data['content'] = ContentIdea::where('freelance_id',auth()->user()->id)->count();
        $data['user'] = auth()->user();
        return view('Freelance.dashboard',$data);
    }
    public function coba()
    {
        $url = env('API_BASE_URL'); 
        $response = Http::withHeaders([
            'Authorization' => 'Bearer 4|nGBNb4zwVWUoPe93KPakZERzhM0QwZoD1xJjpHFc8cd108e7',
        ])->get($url . 'keywords');
    
        if ($response->successful()) {
            $data = json_decode($response->body(), true); // true untuk hasil sebagai array
            dd($data);
        } else {
            $error = json_decode($response->body(), true);
            dd([
                'status' => $response->status(),
                'error' => $error
            ]);
        }
}
}
