<?php

// Menentukan namespace controller untuk fitur autentikasi.
namespace App\Http\Controllers\Auth;

// Mengimpor Controller utama Laravel.
use App\Http\Controllers\Controller;

// Mengimpor RedirectResponse untuk menentukan tipe respons pengalihan halaman.
use Illuminate\Http\RedirectResponse;

// Mengimpor Request untuk mengambil data dari permintaan pengguna.
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Mengirimkan notifikasi verifikasi email baru kepada pengguna.
     */
    public function store(Request $request): RedirectResponse
    {
        // Memeriksa apakah email pengguna sudah berhasil diverifikasi.
        if ($request->user()->hasVerifiedEmail()) {

            // Jika email sudah diverifikasi, arahkan pengguna ke dashboard.
            return redirect()->intended(route('dashboard', absolute: false));
        }

        // Mengirimkan email berisi tautan verifikasi ke alamat email pengguna.
        $request->user()->sendEmailVerificationNotification();

        // Kembali ke halaman sebelumnya dan mengirimkan status bahwa tautan verifikasi telah dikirim.
        return back()->with('status', 'verification-link-sent');
    }
}