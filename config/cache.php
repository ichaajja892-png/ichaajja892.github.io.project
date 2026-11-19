<?php

// Mengimpor Str untuk menggunakan fungsi pengolahan teks dari Laravel.
use Illuminate\Support\Str;

// Mengembalikan konfigurasi cache aplikasi Laravel.
return [

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | Menentukan tempat penyimpanan cache default yang digunakan
    | oleh aplikasi Laravel.
    |
    */

    // Menentukan jenis penyimpanan cache default berdasarkan CACHE_STORE.
    // Jika tidak diatur, Laravel menggunakan database.
    'default' => env('CACHE_STORE', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Mengatur berbagai pilihan tempat penyimpanan cache
    | beserta driver yang digunakan oleh aplikasi.
    |
    */

    // Mendefinisikan berbagai jenis penyimpanan cache.
    'stores' => [

        // Konfigurasi cache menggunakan array.
        'array' => [
            // Menentukan array sebagai driver penyimpanan cache.
            'driver' => 'array',

            // Menonaktifkan proses serialisasi data cache.
            'serialize' => false,
        ],

        // Konfigurasi cache menggunakan database.
        'database' => [
            // Menggunakan database sebagai driver cache.
            'driver' => 'database',

            // Menentukan koneksi database untuk penyimpanan cache.
            'connection' => env('DB_CACHE_CONNECTION'),

            // Menentukan nama tabel untuk menyimpan data cache.
            'table' => env('DB_CACHE_TABLE', 'cache'),

            // Menentukan koneksi database untuk pengelolaan cache lock.
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'),

            // Menentukan nama tabel untuk menyimpan data cache lock.
            'lock_table' => env('DB_CACHE_LOCK_TABLE'),
        ],

        // Konfigurasi cache menggunakan file.
        'file' => [
            // Menggunakan file sebagai driver cache.
            'driver' => 'file',

            // Menentukan lokasi penyimpanan data cache.
            'path' => storage_path('framework/cache/data'),

            // Menentukan lokasi penyimpanan file cache lock.
            'lock_path' => storage_path('framework/cache/data'),
        ],

        // Konfigurasi cache menggunakan Memcached.
        'memcached' => [
            // Menentukan Memcached sebagai driver cache.
            'driver' => 'memcached',

            // Mengatur ID koneksi Memcached yang digunakan secara permanen.
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),

            // Mengatur informasi autentikasi Memcached.
            'sasl' => [
                // Mengambil username Memcached dari file .env.
                env('MEMCACHED_USERNAME'),

                // Mengambil password Memcached dari file .env.
                env('MEMCACHED_PASSWORD'),
            ],

            // Mengatur pilihan tambahan untuk koneksi Memcached.
            'options' => [
                // Contoh pengaturan batas waktu koneksi Memcached.
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],

            // Mengatur daftar server Memcached yang digunakan.
            'servers' => [
                [
                    // Menentukan alamat server Memcached.
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),

                    // Menentukan port server Memcached.
                    'port' => env('MEMCACHED_PORT', 11211),

                    // Menentukan bobot server dalam pembagian beban.
                    'weight' => 100,
                ],
            ],
        ],

        // Konfigurasi cache menggunakan Redis.
        'redis' => [
            // Menentukan Redis sebagai driver cache.
            'driver' => 'redis',

            // Menentukan koneksi Redis untuk penyimpanan cache.
            'connection' => env('REDIS_CACHE_CONNECTION', 'cache'),

            // Menentukan koneksi Redis untuk pengelolaan cache lock.
            'lock_connection' => env('REDIS_CACHE_LOCK_CONNECTION', 'default'),
        ],

        // Konfigurasi cache menggunakan Amazon DynamoDB.
        'dynamodb' => [
            // Menentukan DynamoDB sebagai driver cache.
            'driver' => 'dynamodb',

            // Mengambil access key AWS dari file .env.
            'key' => env('AWS_ACCESS_KEY_ID'),

            // Mengambil secret key AWS dari file .env.
            'secret' => env('AWS_SECRET_ACCESS_KEY'),

            // Menentukan wilayah server AWS yang digunakan.
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),

            // Menentukan nama tabel untuk menyimpan cache di DynamoDB.
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),

            // Menentukan alamat endpoint DynamoDB jika menggunakan endpoint khusus.
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        // Konfigurasi cache menggunakan Laravel Octane.
        'octane' => [
            // Menentukan Octane sebagai driver cache.
            'driver' => 'octane',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | Mengatur awalan nama untuk setiap cache key agar tidak
    | terjadi benturan dengan cache milik aplikasi lain.
    |
    */

    // Membuat awalan nama cache berdasarkan nama aplikasi.
    // Nama aplikasi diubah menjadi format slug menggunakan Str::slug().
    // Jika tidak ada APP_NAME, nama default yang digunakan adalah laravel.
    'prefix' => env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_cache_'),

];