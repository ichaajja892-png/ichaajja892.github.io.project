<?php

// Menentukan namespace controller untuk fitur autentikasi.
namespace App\Http\Controllers\Auth;

// Mengimpor Controller utama Laravel.
use App\Http\Controllers\Controller;

// Mengimpor RedirectResponse untuk menentukan tipe respons pengalihan halaman.
use Illuminate\Http\RedirectResponse;

// Mengimpor Request untuk mengambil data dari permintaan pengguna.
use Illuminate\Http\Request;

// Mengimpor Auth untuk mengelola proses autentikasi pengguna.
use Illuminate\Support\Facades\Auth;

// Mengimpor ValidationException untuk menampilkan pesan kesalahan validasi.
use Illuminate\Validation\ValidationException;

// Mengimpor Inertia untuk menampilkan halaman menggunakan Inertia.js.
use Inertia\Inertia;

// Mengimpor Response untuk menentukan tipe respons halaman.
use Inertia\Response;

class ConfirmablePasswordController extends Controller
{
    /**
     * Menampilkan halaman konfirmasi password pengguna.
     */
    public function show(): Response
    {
        // Menampilkan halaman ConfirmPassword pada folder Auth.
        return Inertia::render('Auth/ConfirmPassword');
    }

    /**
     * Memeriksa dan mengonfirmasi password pengguna.
     */
    public function store(Request $request): RedirectResponse
    {
        // Memeriksa apakah email dan password pengguna sesuai dengan data autentikasi.
        if (! Auth::guard('web')->validate([
            // Mengambil email dari pengguna yang sedang login.
            'email' => $request->user()->email,

            // Mengambil password yang dimasukkan oleh pengguna.
            'password' => $request->password,
        ])) {

            // Jika password salah, sistem akan menampilkan pesan kesalahan.
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        // Menyimpan waktu ketika password berhasil dikonfirmasi ke dalam session.
        $request->session()->put('auth.password_confirmed_at', time());

        // Mengarahkan pengguna kembali ke halaman tujuan atau dashboard.
        return redirect()->intended(route('dashboard', absolute: false));
    }
}