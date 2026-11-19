<?php

// Menentukan namespace controller untuk fitur autentikasi.
namespace App\Http\Controllers\Auth;

// Mengimpor Controller utama Laravel.
use App\Http\Controllers\Controller;

// Mengimpor RedirectResponse untuk menentukan tipe respons pengalihan halaman.
use Illuminate\Http\RedirectResponse;

// Mengimpor Request untuk mengambil data dari permintaan pengguna.
use Illuminate\Http\Request;

// Mengimpor Password untuk mengelola proses pengiriman tautan reset password.
use Illuminate\Support\Facades\Password;

// Mengimpor ValidationException untuk menangani kesalahan validasi.
use Illuminate\Validation\ValidationException;

// Mengimpor Inertia untuk menampilkan halaman menggunakan Inertia.js.
use Inertia\Inertia;

// Mengimpor Response untuk menentukan tipe respons halaman.
use Inertia\Response;

class PasswordResetLinkController extends Controller
{
    /**
     * Menampilkan halaman permintaan tautan reset password.
     */
    public function create(): Response
    {
        // Menampilkan halaman ForgotPassword pada folder Auth.
        // Status digunakan untuk menampilkan pesan pemberitahuan kepada pengguna.
        return Inertia::render('Auth/ForgotPassword', [
            'status' => session('status'),
        ]);
    }

    /**
     * Memproses permintaan pengiriman tautan reset password.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Memvalidasi alamat email yang dimasukkan oleh pengguna.
        $request->validate([
            // Email wajib diisi dan harus menggunakan format email yang benar.
            'email' => 'required|email',
        ]);

        // Mengirimkan tautan reset password ke alamat email pengguna
        // melalui fitur bawaan Laravel.
        $status = Password::sendResetLink(
            // Mengambil alamat email dari data yang dikirimkan pengguna.
            $request->only('email')
        );

        // Memeriksa apakah tautan reset password berhasil dikirim.
        if ($status == Password::RESET_LINK_SENT) {

            // Jika berhasil, kembali ke halaman sebelumnya
            // dan menampilkan pesan bahwa tautan reset password telah dikirim.
            return back()->with('status', __($status));
        }

        // Jika pengiriman gagal, tampilkan pesan kesalahan pada bagian email.
        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }
}