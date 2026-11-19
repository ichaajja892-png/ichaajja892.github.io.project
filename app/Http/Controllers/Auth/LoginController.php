<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

// Controller untuk menangani proses login dan logout pengguna.
class LoginController extends Controller
{
    // Menampilkan halaman login kepada pengguna.
    public function showLoginForm()
    {
        // Menampilkan halaman Login yang berada di folder Auth menggunakan Inertia.
        return Inertia::render('Auth/Login');
    }

    // Memproses data login yang dimasukkan oleh pengguna.
    public function login(Request $request)
    {
        // Memvalidasi email dan password yang dikirimkan melalui form login.
        $credentials = $request->validate([
            // Email wajib diisi dan harus menggunakan format email yang valid.
            'email' => ['required', 'email'],

            // Password wajib diisi oleh pengguna.
            'password' => ['required'],
        ]);

        // Memeriksa apakah email dan password sesuai dengan data pengguna di database.
        if (Auth::attempt($credentials)) {

            // Membuat ulang session untuk meningkatkan keamanan setelah login berhasil.
            $request->session()->regenerate();

            // Mengarahkan pengguna ke halaman posts atau halaman tujuan sebelumnya.
            return redirect()->intended('/posts');
        }

        // Jika login gagal, kembali ke halaman sebelumnya dengan pesan kesalahan.
        return back()->withErrors([
            // Menampilkan pesan bahwa email atau password yang dimasukkan salah.
            'email' => 'Email atau password salah.',
        ]);
    }

    // Memproses logout atau mengakhiri sesi login pengguna.
    public function logout(Request $request)
    {
        // Mengeluarkan pengguna dari sistem autentikasi Laravel.
        Auth::logout();

        // Menghapus seluruh data session pengguna.
        $request->session()->invalidate();

        // Membuat token CSRF baru untuk keamanan aplikasi.
        $request->session()->regenerateToken();

        // Mengarahkan pengguna kembali ke halaman login.
        return redirect('/login');
    }
}