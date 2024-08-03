<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Imports\KeywordsImport;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class KeywordController extends Controller
{
    public function index(Request $request)
    {
        try {
            $perPage = 10; // Jumlah item per halaman, bisa disesuaikan sesuai kebutuhan
           if (Auth::user()->role == 'admin') {
                if ($request->freelanceId) {
                    $data = Keyword::where('freelance_id',$request->freelanceId)->paginate($perPage);
                }else{
                    $data = Keyword::paginate($perPage);
                }
           }else{
            if ($request->freelanceId) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Forbidden.'
                    ], 403);
                }else{
                    $data = Keyword::where('freelance_id',Auth::user()->id)->paginate($perPage);
                }
           }
    
            // Format data paginasi
            $pagination = [
                'total' => $data->total(),
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'last_page' => $data->lastPage(),
                'next_page_url' => $data->nextPageUrl(),
                'prev_page_url' => $data->previousPageUrl(),
            ];
    
            return response()->json([
                'status' => 'success',
                'data' => $data->items(), 
                'pagination' => $pagination
            ], 200);
    
        } catch (\Exception $e) {
            // Jika terjadi kesalahan
            return response()->json([
                'status' => 'error',
                'message' => 'failed fetched data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function show($id)
    {
        try {
           if (Auth::user()->role == 'admin') {
            $data = Keyword::findOrFail($id);
           }else{
            $data = Keyword::where('freelance_id',Auth::user()->id)->where('id',$id)->first();
           }
            return response()->json([
                'status' => 'success',
                'data' => $data, 
            ], 200);
    
        } catch (\Exception $e) {
            // Jika terjadi kesalahan
            return response()->json([
                'status' => 'error',
                'message' => 'failed fteched keyword',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'kata_kunci' => 'sometimes|required|string',
            'volume' => 'sometimes|required|integer',
            'cpc' => 'sometimes|required|string',
            'ads' => 'sometimes|required|numeric',
            'seo' => 'sometimes|required|integer',
            'bahasa' => 'sometimes|required|string',
        ]);
        try{
           if (Auth::user()->role == 'admin') {
            $keyword = Keyword::findOrFail($id);
           }{
            $keyword = Keyword::where('freelance_id',Auth::user()->id)->where('id',$id)->first();
           }
            $keyword->update($request->all());

            return response()->json([
                'status' => 'success',
                'data' => $keyword,
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'failed updated keyword',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function destroy($id)
    {
        try {
           if (Auth::user()->role == 'admin') {
            Keyword::destroy($id);
           }else{
               Keyword::where('freelance_id',Auth::user()->id)->where('id',$id)->first();
           }

            return response()->json([
                'status' => 'success',
                'message' => 'keyword deleted.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'deleted failed.',
                'error' => $e->getMessage()
            ], 200);
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
            'language' => 'required|string',
        ]);

        $language = $request->input('language');

        Excel::import(new KeywordsImport($language), $request->file('file'));

        return response()->json(['message' => 'Keywords imported successfully']);
    }
}
