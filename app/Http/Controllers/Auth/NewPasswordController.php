<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

// Controller untuk menangani proses pembuatan password baru setelah pengguna melakukan reset password.
class NewPasswordController extends Controller
{
    /**
     * Menampilkan halaman untuk mengatur ulang password.
     */
    public function create(Request $request): Response
    {
        // Menampilkan halaman ResetPassword pada folder Auth menggunakan Inertia.
        return Inertia::render('Auth/ResetPassword', [
            // Mengirimkan alamat email pengguna ke halaman reset password.
            'email' => $request->email,

            // Mengambil token reset password dari URL.
            'token' => $request->route('token'),
        ]);
    }

    /**
     * Memproses permintaan pembuatan password baru.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Memvalidasi token, email, password, dan konfirmasi password.
        $request->validate([
            // Token wajib diisi untuk memastikan proses reset password valid.
            'token' => 'required',

            // Email wajib diisi dan harus menggunakan format email yang benar.
            'email' => 'required|email',

            // Password wajib diisi, harus sesuai dengan konfirmasi,
            // dan mengikuti aturan keamanan password Laravel.
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Memproses permintaan reset password menggunakan fitur Password Laravel.
        $status = Password::reset(
            // Mengambil data email, password, konfirmasi password, dan token dari form.
            $request->only('email', 'password', 'password_confirmation', 'token'),

            // Menjalankan proses pembaruan password jika token berhasil diverifikasi.
            function ($user) use ($request) {

                // Mengisi data password baru dan token pengingat pengguna.
                $user->forceFill([
                    // Mengenkripsi password baru sebelum disimpan ke database.
                    'password' => Hash::make($request->password),

                    // Membuat remember token baru secara acak.
                    'remember_token' => Str::random(60),

                // Menyimpan perubahan data pengguna ke database.
                ])->save();

                // Menjalankan event bahwa password pengguna berhasil direset.
                event(new PasswordReset($user));
            }
        );

        // Memeriksa apakah proses reset password berhasil.
        if ($status == Password::PASSWORD_RESET) {

            // Jika berhasil, arahkan pengguna ke halaman login
            // dan tampilkan pesan bahwa password berhasil direset.
            return redirect()->route('login')->with('status', __($status));
        }

        // Jika proses reset password gagal, tampilkan pesan kesalahan pada bagian email.
        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }
}