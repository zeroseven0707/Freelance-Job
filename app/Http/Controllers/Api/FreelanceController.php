<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FreelanceController extends Controller
{
    public function index()
    {
        try {
            $perPage = 10; // Jumlah item per halaman, bisa disesuaikan sesuai kebutuhan
            $data = User::where('role','freelance')->withCount(['keyword', 'content'])->paginate($perPage);
    
            // Format data paginasi
            $pagination = [
                'total' => $data->total(),
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'last_page' => $data->lastPage(),
                'next_page_url' => $data->nextPageUrl(),
                'prev_page_url' => $data->previousPageUrl(),
            ];
            if ($data) {
                # code...
                return response()->json([
                    'status' => 'success',
                    'data' => $data->items(), 
                    'pagination' => $pagination
                ], 200);
            }else{
                return response()->json([
                    'status' => 'success',
                    'data' => null, 
                ], 204);
            }
    
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
            $data = User::where('role','freelance')->where('id',$id)->first();

            if ($data) {
                # code...
                return response()->json([
                    'status' => 'success',
                    'data' => $data, 
                ], 200);
            }else{
                return response()->json([],204);
            }
    
        } catch (\Exception $e) {
            // Jika terjadi kesalahan
            return response()->json([
                'status' => 'error',
                'message' => 'failed fteched data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required'
        ]);
          $validate['password'] = bcrypt($request->password);
        try{
            $data = User::where('role','freelance')->where('id',$id)->first();
            $data->update($validate);

            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'failed updated data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function destroy($id)
    {
        try {
            User::where('role','freelance')->where('id',$id)->destroy($id);

            return response()->json([
                'status' => 'success',
                'message' => 'deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'deleted failed.',
                'error' => $e->getMessage()
            ], 200);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        try {
            $data = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'role'=>'freelance'
            ]);

            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => "failed because " . $e->getMessage(),
            ],500);
        }

        return response()->json(['message' => 'created successfully']);
    }
}
