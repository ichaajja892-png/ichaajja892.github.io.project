<?php

// Mengembalikan konfigurasi sistem penyimpanan file pada Laravel.
return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Bagian ini menentukan disk penyimpanan utama yang digunakan
    | oleh aplikasi Laravel untuk menyimpan file.
    |
    */

    // Menentukan disk penyimpanan default berdasarkan pengaturan di file .env.
    // Jika tidak diatur, Laravel akan menggunakan disk local.
    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Bagian ini berisi konfigurasi berbagai tempat penyimpanan file
    | yang dapat digunakan oleh aplikasi Laravel.
    |
    */

    'disks' => [

        // Konfigurasi penyimpanan file secara lokal dan bersifat privat.
        'local' => [
            'driver' => 'local', // Menggunakan penyimpanan file lokal.
            'root' => storage_path('app/private'), // Menentukan folder penyimpanan file privat.
            'serve' => true, // Mengizinkan Laravel menyajikan file melalui mekanisme penyimpanan lokal.
            'throw' => false, // Tidak melemparkan exception ketika operasi penyimpanan gagal.
            'report' => false, // Tidak melaporkan kegagalan operasi penyimpanan.
        ],

        // Konfigurasi penyimpanan file lokal yang dapat diakses secara publik.
        'public' => [
            'driver' => 'local', // Menggunakan penyimpanan file lokal.
            'root' => storage_path('app/public'), // Menentukan folder penyimpanan file publik.
            'url' => env('APP_URL').'/storage', // Menentukan URL untuk mengakses file publik.
            'visibility' => 'public', // Mengatur agar file dapat diakses secara publik.
            'throw' => false, // Tidak melemparkan exception ketika operasi penyimpanan gagal.
            'report' => false, // Tidak melaporkan kegagalan operasi penyimpanan.
        ],

        // Konfigurasi penyimpanan file menggunakan layanan cloud Amazon S3.
        's3' => [
            'driver' => 's3', // Menggunakan layanan penyimpanan Amazon S3.
            'key' => env('AWS_ACCESS_KEY_ID'), // Mengambil access key dari file .env.
            'secret' => env('AWS_SECRET_ACCESS_KEY'), // Mengambil secret key dari file .env.
            'region' => env('AWS_DEFAULT_REGION'), // Menentukan wilayah server penyimpanan S3.
            'bucket' => env('AWS_BUCKET'), // Menentukan nama bucket untuk menyimpan file.
            'url' => env('AWS_URL'), // Mengambil URL akses penyimpanan S3.
            'endpoint' => env('AWS_ENDPOINT'), // Menentukan alamat endpoint layanan penyimpanan.
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false), // Mengatur penggunaan format path-style pada endpoint.
            'throw' => false, // Tidak melemparkan exception ketika operasi penyimpanan gagal.
            'report' => false, // Tidak melaporkan kegagalan operasi penyimpanan.
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Bagian ini mengatur symbolic link atau tautan penghubung
    | antara folder penyimpanan dengan folder publik aplikasi.
    |
    */

    // Menentukan lokasi symbolic link yang dibuat oleh perintah storage:link.
    'links' => [
        public_path('storage') => storage_path('app/public'), // Menghubungkan folder public/storage dengan storage/app/public.
    ],

];