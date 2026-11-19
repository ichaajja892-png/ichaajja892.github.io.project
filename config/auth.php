<?php

// Mengembalikan konfigurasi autentikasi aplikasi Laravel.
return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Mengatur guard autentikasi dan broker reset password
    | yang digunakan secara default oleh aplikasi.
    |
    */

    // Mengatur konfigurasi autentikasi utama aplikasi.
    'defaults' => [

        // Menentukan guard autentikasi default, yaitu web.
        'guard' => env('AUTH_GUARD', 'web'),

        // Menentukan broker yang digunakan untuk proses reset password.
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Mengatur metode autentikasi yang digunakan aplikasi
    | untuk memeriksa identitas pengguna.
    |
    */

    // Mendefinisikan guard yang digunakan untuk autentikasi.
    'guards' => [

        // Konfigurasi guard web untuk pengguna aplikasi.
        'web' => [

            // Menggunakan session sebagai metode penyimpanan autentikasi.
            'driver' => 'session',

            // Menghubungkan guard web dengan provider users.
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Mengatur sumber data yang digunakan Laravel
    | untuk mengambil informasi pengguna.
    |
    */

    // Mendefinisikan provider untuk mengambil data pengguna.
    'providers' => [

        // Konfigurasi provider users.
        'users' => [

            // Menggunakan Eloquent untuk mengambil data pengguna dari database.
            'driver' => 'eloquent',

            // Menentukan model User yang digunakan untuk mengelola data pengguna.
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // Contoh konfigurasi jika ingin menggunakan database secara langsung.
        // 'users' => [
        //     // Menggunakan database sebagai metode pengambilan data pengguna.
        //     'driver' => 'database',

        //     // Menentukan tabel users sebagai sumber data pengguna.
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Mengatur konfigurasi proses reset password,
    | termasuk tabel penyimpanan token dan waktu kedaluwarsanya.
    |
    */

    // Mengatur konfigurasi reset password berdasarkan provider pengguna.
    'passwords' => [

        // Konfigurasi reset password untuk pengguna.
        'users' => [

            // Menggunakan provider users untuk mencari data akun pengguna.
            'provider' => 'users',

            // Menentukan tabel database untuk menyimpan token reset password.
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),

            // Menentukan masa berlaku token reset password selama 60 menit.
            'expire' => 60,

            // Menentukan jeda 60 detik sebelum pengguna dapat meminta token baru.
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Mengatur batas waktu konfirmasi password sebelum pengguna
    | diminta memasukkan password kembali.
    |
    */

    // Menentukan batas waktu konfirmasi password dalam satuan detik.
    // Nilai 10800 detik sama dengan 3 jam.
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];