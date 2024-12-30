<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request){
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cek kredensial dan login
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            // Redirect ke halaman home setelah login sukses
            return redirect()->intended('/');
        }

        // Jika gagal login, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ]);
    }
}
