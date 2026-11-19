
<?php

// Mengimpor ProfileController untuk mengatur pengelolaan profil pengguna.
use App\Http\Controllers\ProfileController;

// Mengimpor Application untuk mendapatkan informasi versi Laravel.
use Illuminate\Foundation\Application;

// Mengimpor Route untuk membuat dan mengatur alamat URL aplikasi.
use Illuminate\Support\Facades\Route;

// Mengimpor Inertia untuk menampilkan halaman menggunakan Inertia.js.
use Inertia\Inertia;


// Membuat route utama aplikasi dengan alamat URL '/'.
Route::get('/', function () {

    // Menampilkan halaman Welcome menggunakan Inertia.js.
    return Inertia::render('Welcome', [

        // Memeriksa apakah route login tersedia.
        // Hasilnya berupa true jika tersedia dan false jika tidak.
        'canLogin' => Route::has('login'),

        // Memeriksa apakah route register tersedia.
        'canRegister' => Route::has('register'),

        // Mengirim informasi versi Laravel ke halaman Welcome.
        'laravelVersion' => Application::VERSION,

        // Mengirim informasi versi PHP yang sedang digunakan.
        'phpVersion' => PHP_VERSION,
    ]);
});


// Membuat route dashboard dengan alamat URL '/dashboard'.
Route::get('/dashboard', function () {

    // Menampilkan halaman Dashboard menggunakan Inertia.js.
    return Inertia::render('Dashboard');

// Membatasi akses agar hanya pengguna yang sudah login
// dan sudah melakukan verifikasi email yang dapat membuka dashboard.
})->middleware(['auth', 'verified'])->name('dashboard');


// Mengelompokkan route profil yang hanya dapat diakses oleh pengguna yang sudah login.
Route::middleware('auth')->group(function () {

    // Menampilkan halaman edit profil pengguna.
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    // Memproses perubahan atau pembaruan data profil pengguna.
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Memproses penghapusan akun atau profil pengguna.
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Memanggil file auth.php yang berisi kumpulan route autentikasi,
// seperti register, login, lupa password, verifikasi email, dan logout.
require __DIR__.'/auth.php';
