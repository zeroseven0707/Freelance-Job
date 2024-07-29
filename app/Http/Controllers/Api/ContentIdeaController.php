<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Imports\ContentIdeasImport;
use App\Models\ContentIdea;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ContentIdeaController extends Controller
{
    public function index()
    {
        try {
            $perPage = 10; // Jumlah item per halaman, bisa disesuaikan sesuai kebutuhan
            $data = ContentIdea::paginate($perPage);
    
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
            $data = ContentIdea::findOrFail($id);

            return response()->json([
                'status' => 'success',
                'data' => $data, 
            ], 200);
    
        } catch (\Exception $e) {
            // Jika terjadi kesalahan
            return response()->json([
                'status' => 'error',
                'message' => 'failed fteched Content Idea',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'sometimes|required|string',
            'url' => 'sometimes|required|string',
            'est_visit' => 'sometimes|required|integer',
            'backlink' => 'sometimes|required|integer',
            'facebook' => 'sometimes|required|integer',
            'bahasa' => 'sometimes|required|string',
        ]);
    try{
        $contentIdea = ContentIdea::findOrFail($id);
        $contentIdea->update($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $contentIdea,
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'failed updated content idea',
            'error' => $e->getMessage()
        ], 500);
    }
    }

    public function destroy($id)
    {
        try {
            ContentIdea::destroy($id);
            return response()->json([
                'status' => 'success',
                'message' => 'Content Idea deleted.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'deleted failed.',
                'error' => $e->getMessage()
            ], 200);
        }
    }

    // Import
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
            'language' => 'required|string',
        ]);

        $language = $request->input('language');

        Excel::import(new ContentIdeasImport($language), $request->file('file'));

        return response()->json(['message' => 'Content Ideas imported successfully']);
    }
}
