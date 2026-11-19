
<?php

use Illuminate\Support\Str;

// Mengimpor class Str dari Laravel untuk mengolah teks atau string.

return [

    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
    | Menentukan metode penyimpanan session yang digunakan oleh Laravel.
    | Session digunakan untuk menyimpan informasi sementara pengguna,
    | misalnya status login selama menggunakan aplikasi.
    |
    */

    // Menentukan tempat penyimpanan session.
    // Nilai default adalah database jika SESSION_DRIVER tidak diatur di .env.
    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | Menentukan berapa lama session dapat bertahan ketika tidak ada aktivitas.
    |
    */

    // Menentukan masa berlaku session dalam satuan menit.
    // Nilai default adalah 120 menit atau 2 jam.
    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    // Menentukan apakah session langsung berakhir ketika browser ditutup.
    // Nilai false berarti session tidak otomatis berakhir hanya karena browser ditutup.
    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Session Encryption
    |--------------------------------------------------------------------------
    |
    | Mengatur apakah data session dienkripsi sebelum disimpan.
    |
    */

    // Mengaktifkan atau menonaktifkan enkripsi data session.
    // Nilai default false berarti enkripsi tambahan untuk session tidak diaktifkan.
    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Session File Location
    |--------------------------------------------------------------------------
    |
    | Menentukan lokasi penyimpanan file session jika menggunakan
    | driver file.
    |
    */

    // Menentukan folder tempat file session disimpan.
    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Connection
    |--------------------------------------------------------------------------
    |
    | Menentukan koneksi database yang digunakan untuk menyimpan session.
    |
    */

    // Mengambil nama koneksi database dari file .env.
    // Jika kosong, Laravel menggunakan koneksi database default.
    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Table
    |--------------------------------------------------------------------------
    |
    | Menentukan nama tabel database yang digunakan untuk menyimpan session.
    |
    */

    // Menentukan tabel penyimpanan session.
    // Nama tabel default adalah sessions.
    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Cache Store
    |--------------------------------------------------------------------------
    |
    | Menentukan cache store yang digunakan untuk menyimpan data session
    | jika menggunakan driver session berbasis cache.
    |
    */

    // Mengambil nama cache store dari file .env.
    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Session Sweeping Lottery
    |--------------------------------------------------------------------------
    |
    | Mengatur peluang Laravel untuk membersihkan data session yang sudah
    | kedaluwarsa dari tempat penyimpanan.
    |
    */

    // Peluang pembersihan session adalah 2 dari 100 permintaan.
    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Name
    |--------------------------------------------------------------------------
    |
    | Menentukan nama cookie yang digunakan untuk mengenali session pengguna.
    |
    */

    // Menentukan nama cookie session.
    // Nama dibuat berdasarkan nama aplikasi yang diatur pada APP_NAME.
    // Jika tidak diatur, nama aplikasi default adalah laravel.
    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Path
    |--------------------------------------------------------------------------
    |
    | Menentukan jalur aplikasi tempat cookie session dapat digunakan.
    |
    */

    // Menentukan lokasi atau jalur cookie berlaku.
    // Nilai '/' berarti cookie berlaku untuk seluruh halaman aplikasi.
    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Domain
    |--------------------------------------------------------------------------
    |
    | Menentukan domain dan subdomain yang dapat menggunakan cookie session.
    |
    */

    // Mengatur domain tempat cookie session dapat digunakan.
    // Nilainya diambil dari SESSION_DOMAIN pada file .env.
    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | HTTPS Only Cookies
    |--------------------------------------------------------------------------
    |
    | Mengatur apakah cookie session hanya boleh dikirim melalui koneksi HTTPS.
    |
    */

    // Mengatur keamanan pengiriman cookie melalui koneksi HTTPS.
    // Jika true, cookie hanya dikirim melalui koneksi HTTPS.
    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | HTTP Access Only
    |--------------------------------------------------------------------------
    |
    | Mengatur agar cookie session tidak dapat diakses melalui JavaScript.
    |
    */

    // Mengatur agar cookie hanya dapat diakses melalui protokol HTTP.
    // Nilai true membantu melindungi cookie dari akses JavaScript.
    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Same-Site Cookies
    |--------------------------------------------------------------------------
    |
    | Mengatur perilaku cookie ketika terjadi permintaan dari situs lain.
    | Pengaturan ini membantu mengurangi risiko serangan CSRF.
    |
    */

    // Mengatur kebijakan penggunaan cookie pada permintaan lintas situs.
    // Nilai lax merupakan pengaturan default dari Laravel.
    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Partitioned Cookies
    |--------------------------------------------------------------------------
    |
    | Mengatur apakah cookie dipisahkan berdasarkan situs tingkat atas
    | ketika digunakan dalam konteks lintas situs.
    |
    */

    // Mengaktifkan atau menonaktifkan fitur partitioned cookies.
    // Nilai default false berarti fitur ini tidak diaktifkan.
    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];
