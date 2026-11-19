<?php

// Menentukan namespace controller untuk fitur autentikasi.
namespace App\Http\Controllers\Auth;

// Mengimpor Controller utama Laravel.
use App\Http\Controllers\Controller;

// Mengimpor model User untuk mengelola data pengguna di database.
use App\Models\User;

// Mengimpor event Registered untuk menandai bahwa pengguna berhasil mendaftar.
use Illuminate\Auth\Events\Registered;

// Mengimpor RedirectResponse untuk menentukan tipe respons pengalihan halaman.
use Illuminate\Http\RedirectResponse;

// Mengimpor Request untuk mengambil data dari permintaan pengguna.
use Illuminate\Http\Request;

// Mengimpor Auth untuk mengelola proses autentikasi pengguna.
use Illuminate\Support\Facades\Auth;

// Mengimpor Hash untuk mengenkripsi password.
use Illuminate\Support\Facades\Hash;

// Mengimpor Rules untuk menerapkan aturan validasi password Laravel.
use Illuminate\Validation\Rules;

// Mengimpor ValidationException untuk menangani kesalahan validasi.
use Illuminate\Validation\ValidationException;

// Mengimpor Inertia untuk menampilkan halaman menggunakan Inertia.js.
use Inertia\Inertia;

// Mengimpor Response untuk menentukan tipe respons halaman.
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Menampilkan halaman pendaftaran pengguna.
     */
    public function create(): Response
    {
        // Menampilkan halaman Register yang berada di folder Auth.
        return Inertia::render('Auth/Register');
    }

    /**
     * Memproses permintaan pendaftaran pengguna baru.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Memvalidasi data yang dimasukkan pengguna pada formulir pendaftaran.
        $request->validate([
            // Nama wajib diisi, harus berupa teks, dan maksimal 255 karakter.
            'name' => 'required|string|max:255',

            // Email wajib diisi, menggunakan format email yang benar,
            // diubah menjadi huruf kecil, maksimal 255 karakter,
            // dan tidak boleh sama dengan email pengguna lain.
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,

            // Password wajib diisi, harus sesuai dengan konfirmasi,
            // dan mengikuti aturan keamanan password Laravel.
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Membuat data pengguna baru dan menyimpannya ke database.
        $user = User::create([
            // Menyimpan nama pengguna.
            'name' => $request->name,

            // Menyimpan alamat email pengguna.
            'email' => $request->email,

            // Mengenkripsi password sebelum disimpan ke database.
            'password' => Hash::make($request->password),
        ]);

        // Menjalankan event Registered sebagai tanda pengguna berhasil mendaftar.
        event(new Registered($user));

        // Langsung melakukan login menggunakan akun yang baru dibuat.
        Auth::login($user);

        // Mengarahkan pengguna ke halaman dashboard setelah berhasil mendaftar.
        return redirect(route('dashboard', absolute: false));
    }
}