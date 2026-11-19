<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

// Controller untuk menangani proses perubahan password pengguna.
class PasswordController extends Controller
{
    /**
     * Memperbarui password milik pengguna.
     */
    public function update(Request $request): RedirectResponse
    {
        // Memvalidasi password lama dan password baru yang dimasukkan pengguna.
        $validated = $request->validate([
            // Password lama wajib diisi dan harus sesuai dengan password akun saat ini.
            'current_password' => ['required', 'current_password'],

            // Password baru wajib diisi, mengikuti aturan keamanan Laravel,
            // dan harus sesuai dengan konfirmasi password.
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        // Memperbarui password pengguna yang sedang login.
        $request->user()->update([
            // Mengenkripsi password baru sebelum disimpan ke database.
            'password' => Hash::make($validated['password']),
        ]);

        // Mengembalikan pengguna ke halaman sebelumnya setelah password diperbarui.
        return back();
    }
}