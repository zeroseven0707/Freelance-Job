<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    // View Login
    public function index()
    {
        return view('login');
    }
    // Login user
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            // Cari pengguna berdasarkan email
            $user = User::where('email', $data['email'])->first();
            // Periksa apakah pengguna ada dan password cocok
            if ($user && Hash::check($data['password'], $user->password)) {
                Auth::login($user);
                // Jika peran admin, arahkan ke dashboard admin
                if ($user->role === 'admin') {
                    return redirect()->intended('/admin/dashboard');
                }
                // Jika peran freelance, arahkan ke dashboard freelance
                elseif ($user->role === 'freelance') {
                    return redirect()->intended('/freelance/dashboard');
                }
                // Jika peran tidak dikenali
                else {
                    return back()->withErrors(['error' => 'Unknown role.']);
                }
            } else {
                // Jika email atau password tidak cocok
                return back()->withErrors(['error' => 'Invalid credentials.']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
        return redirect('/')->with('message', 'You have been logged out successfully.');
    }
}
