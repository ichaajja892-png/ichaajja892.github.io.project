<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

// Controller untuk menangani permintaan verifikasi email pengguna.
class EmailVerificationPromptController extends Controller
{
    /**
     * Menampilkan halaman pemberitahuan verifikasi email.
     */
    public function __invoke(Request $request): RedirectResponse|Response
    {
        // Memeriksa apakah email pengguna sudah berhasil diverifikasi.
        return $request->user()->hasVerifiedEmail()

                    // Jika email sudah diverifikasi, arahkan pengguna ke dashboard.
                    ? redirect()->intended(route('dashboard', absolute: false))

                    // Jika email belum diverifikasi, tampilkan halaman VerifyEmail
                    // dengan membawa status dari session.
                    : Inertia::render('Auth/VerifyEmail', ['status' => session('status')]);
    }
}