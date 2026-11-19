<?php

// Menentukan namespace controller utama aplikasi.
namespace App\Http\Controllers;

// Mengimpor ProfileUpdateRequest untuk menangani validasi perubahan profil pengguna.
use App\Http\Requests\ProfileUpdateRequest;

// Mengimpor MustVerifyEmail untuk memeriksa apakah pengguna wajib melakukan verifikasi email.
use Illuminate\Contracts\Auth\MustVerifyEmail;

// Mengimpor RedirectResponse untuk menentukan tipe respons pengalihan halaman.
use Illuminate\Http\RedirectResponse;

// Mengimpor Request untuk mengambil data dari permintaan pengguna.
use Illuminate\Http\Request;

// Mengimpor Auth untuk mengelola proses autentikasi pengguna.
use Illuminate\Support\Facades\Auth;

// Mengimpor Redirect untuk mengarahkan pengguna ke halaman tertentu.
use Illuminate\Support\Facades\Redirect;

// Mengimpor Inertia untuk menampilkan halaman menggunakan Inertia.js.
use Inertia\Inertia;

// Mengimpor Response untuk menentukan tipe respons halaman.
use Inertia\Response;

class ProfileController extends Controller
{
    // Menampilkan halaman edit profil pengguna.
    public function edit(Request $request): Response
    {
        // Menampilkan halaman Edit pada folder Profile
        // sekaligus mengirimkan informasi verifikasi email dan status session.
        return Inertia::render('Profile/Edit', [
            // Memeriksa apakah pengguna menggunakan fitur verifikasi email.
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,

            // Mengambil status pemberitahuan dari session.
            'status' => session('status'),
        ]);
    }

    // Memproses perubahan data profil pengguna.
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Mengisi data pengguna berdasarkan hasil validasi dari formulir.
        $request->user()->fill($request->validated());

        // Memeriksa apakah alamat email pengguna mengalami perubahan.
        if ($request->user()->isDirty('email')) {

            // Menghapus status verifikasi email karena alamat email telah berubah.
            $request->user()->email_verified_at = null;
        }

        // Menyimpan perubahan data profil pengguna ke database.
        $request->user()->save();

        // Mengarahkan pengguna kembali ke halaman edit profil.
        return Redirect::route('profile.edit');
    }

    // Memproses penghapusan akun pengguna.
    public function destroy(Request $request): RedirectResponse
    {
        // Memvalidasi password yang dimasukkan sebelum akun dihapus.
        $request->validate([
            // Password wajib diisi dan harus sesuai dengan password akun saat ini.
            'password' => ['required', 'current_password'],
        ]);

        // Mengambil data pengguna yang sedang login.
        $user = $request->user();

        // Mengeluarkan pengguna dari sistem autentikasi.
        Auth::logout();

        // Menghapus akun pengguna dari database.
        $user->delete();

        // Menghapus seluruh data session pengguna.
        $request->session()->invalidate();

        // Membuat token CSRF baru untuk menjaga keamanan aplikasi.
        $request->session()->regenerateToken();

        // Mengarahkan pengguna ke halaman utama setelah akun berhasil dihapus.
        return Redirect::to('/');
    }
}