<?php

// Menentukan namespace controller untuk fitur autentikasi.
namespace App\Http\Controllers\Auth;

// Mengimpor Controller utama Laravel.
use App\Http\Controllers\Controller;

// Mengimpor event Verified untuk menandai bahwa email berhasil diverifikasi.
use Illuminate\Auth\Events\Verified;

// Mengimpor EmailVerificationRequest untuk memvalidasi permintaan verifikasi email.
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Mengimpor RedirectResponse untuk menentukan tipe respons pengalihan halaman.
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Menandai alamat email pengguna yang sedang login sebagai email terverifikasi.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        // Memeriksa apakah email pengguna sudah pernah diverifikasi.
        if ($request->user()->hasVerifiedEmail()) {

            // Jika sudah diverifikasi, arahkan pengguna ke dashboard
            // dengan parameter verified=1.
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        // Memeriksa dan mengubah status email pengguna menjadi terverifikasi.
        if ($request->user()->markEmailAsVerified()) {

            // Menjalankan event Verified jika email berhasil diverifikasi.
            event(new Verified($request->user()));
        }

        // Mengarahkan pengguna ke dashboard setelah proses verifikasi email.
        // Parameter verified=1 digunakan sebagai penanda bahwa verifikasi berhasil.
        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}