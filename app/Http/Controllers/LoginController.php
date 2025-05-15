<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    //
    
    public function loginView()
    {
        return view('login');
    }
//     Validasi input: Pastikan email dan password tidak kosong. Jika kosong, tampilkan pesan error.
// Cek database:
// Jika user dengan email yang dimasukkan ditemukan, lakukan verifikasi password.

    public function authenticate(Request $request):RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError','Login Failed');

    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
