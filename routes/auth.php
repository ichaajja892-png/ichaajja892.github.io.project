
<?php

// Mengimpor controller yang digunakan untuk mengatur proses autentikasi pengguna.
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

// Mengimpor Route agar dapat membuat dan mengatur alamat URL aplikasi.
use Illuminate\Support\Facades\Route;


// Mengelompokkan route yang hanya boleh diakses oleh pengguna yang belum login (guest).
Route::middleware('guest')->group(function () {

    // Menampilkan halaman formulir pendaftaran akun.
    Route::get('register', [RegisteredUserController::class, 'create'])
        // Memberikan nama register pada route pendaftaran.
        ->name('register');

    // Memproses data pendaftaran akun yang dikirim melalui metode POST.
    Route::post('register', [RegisteredUserController::class, 'store']);

    // Menampilkan halaman login pengguna.
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        // Memberikan nama login pada route masuk.
        ->name('login');

    // Memproses data login yang dimasukkan oleh pengguna.
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Menampilkan formulir untuk meminta tautan reset password.
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        // Memberikan nama password.request pada route lupa password.
        ->name('password.request');

    // Memproses permintaan pengiriman tautan reset password ke email.
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        // Memberikan nama password.email pada route pengiriman tautan.
        ->name('password.email');

    // Menampilkan halaman untuk membuat password baru berdasarkan token.
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        // Memberikan nama password.reset pada route reset password.
        ->name('password.reset');

    // Memproses penyimpanan password baru pengguna.
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        // Memberikan nama password.store pada route penyimpanan password baru.
        ->name('password.store');
});


// Mengelompokkan route yang hanya boleh diakses oleh pengguna yang sudah login (auth).
Route::middleware('auth')->group(function () {

    // Menampilkan halaman pemberitahuan untuk verifikasi email.
    Route::get('verify-email', EmailVerificationPromptController::class)
        // Memberikan nama verification.notice pada route pemberitahuan verifikasi.
        ->name('verification.notice');

    // Memproses verifikasi email berdasarkan ID pengguna dan hash.
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        // Memastikan URL memiliki tanda tangan yang valid dan membatasi jumlah permintaan.
        ->middleware(['signed', 'throttle:6,1'])
        // Memberikan nama verification.verify pada route verifikasi email.
        ->name('verification.verify');

    // Memproses permintaan untuk mengirim ulang email verifikasi.
    Route::post('email/verification-notification', [
        EmailVerificationNotificationController::class,
        'store'
    ])
        // Membatasi permintaan maksimal 6 kali dalam 1 menit.
        ->middleware('throttle:6,1')
        // Memberikan nama verification.send pada route pengiriman ulang email.
        ->name('verification.send');

    // Menampilkan formulir konfirmasi password pengguna.
    Route::get('confirm-password', [
        ConfirmablePasswordController::class,
        'show'
    ])
        // Memberikan nama password.confirm pada route konfirmasi password.
        ->name('password.confirm');

    // Memproses konfirmasi password yang dimasukkan pengguna.
    Route::post('confirm-password', [
        ConfirmablePasswordController::class,
        'store'
    ]);

    // Memproses perubahan password pengguna yang sedang login.
    Route::put('password', [PasswordController::class, 'update'])
        // Memberikan nama password.update pada route perubahan password.
        ->name('password.update');

    // Memproses logout atau mengakhiri sesi login pengguna.
    Route::post('logout', [
        AuthenticatedSessionController::class,
        'destroy'
    ])
        // Memberikan nama logout pada route keluar dari akun.
        ->name('logout');
});
