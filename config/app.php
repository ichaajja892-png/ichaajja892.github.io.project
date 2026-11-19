<?php

// Mengembalikan konfigurasi utama aplikasi Laravel.
return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | Nama aplikasi yang digunakan pada notifikasi atau
    | bagian tampilan lain yang membutuhkan nama aplikasi.
    |
    */

    // Mengatur nama aplikasi berdasarkan APP_NAME pada file .env.
    // Jika tidak diatur, nama default yang digunakan adalah Laravel.
    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | Menentukan lingkungan tempat aplikasi sedang dijalankan,
    | seperti local, development, atau production.
    |
    */

    // Mengatur lingkungan aplikasi berdasarkan APP_ENV pada file .env.
    // Nilai default yang digunakan adalah production.
    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | Mengatur apakah aplikasi menampilkan informasi kesalahan
    | secara detail ketika terjadi error.
    |
    */

    // Mengaktifkan atau menonaktifkan mode debug aplikasi.
    // Jika true, Laravel menampilkan detail kesalahan.
    // Jika false, Laravel menampilkan halaman error sederhana.
    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | Menentukan alamat utama aplikasi yang digunakan
    | Laravel untuk membuat URL.
    |
    */

    // Mengatur URL aplikasi berdasarkan APP_URL pada file .env.
    // Jika tidak diatur, alamat default adalah http://localhost.
    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Menentukan zona waktu default yang digunakan
    | oleh fungsi tanggal dan waktu PHP.
    |
    */

    // Mengatur zona waktu aplikasi.
    // UTC merupakan zona waktu standar yang digunakan Laravel.
    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | Menentukan bahasa utama yang digunakan aplikasi
    | untuk proses penerjemahan atau localization.
    |
    */

    // Mengatur bahasa utama aplikasi berdasarkan APP_LOCALE.
    // Nilai default yang digunakan adalah bahasa Inggris.
    'locale' => env('APP_LOCALE', 'en'),

    // Mengatur bahasa alternatif jika terjemahan utama tidak tersedia.
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    // Mengatur bahasa dan format lokal untuk data palsu yang dibuat Faker.
    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | Mengatur metode dan kunci enkripsi yang digunakan Laravel
    | untuk melindungi data aplikasi.
    |
    */

    // Menentukan algoritma enkripsi yang digunakan oleh aplikasi Laravel.
    'cipher' => 'AES-256-CBC',

    // Mengambil kunci enkripsi aplikasi dari APP_KEY pada file .env.
    'key' => env('APP_KEY'),

    // Menyimpan daftar kunci enkripsi sebelumnya
    // yang masih dapat digunakan untuk proses dekripsi data.
    'previous_keys' => [
        // Mengambil daftar APP_PREVIOUS_KEYS dan memisahkannya
        // berdasarkan tanda koma, kemudian menghapus nilai kosong.
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | Mengatur metode yang digunakan Laravel untuk mengelola
    | mode pemeliharaan atau maintenance aplikasi.
    |
    */

    // Mengatur konfigurasi maintenance mode aplikasi.
    'maintenance' => [

        // Menentukan driver penyimpanan status maintenance.
        // Nilai default yang digunakan adalah file.
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),

        // Menentukan tempat penyimpanan data maintenance.
        // Nilai default yang digunakan adalah database.
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];