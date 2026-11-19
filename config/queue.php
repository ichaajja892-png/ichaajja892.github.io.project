<?php

// Mengembalikan konfigurasi sistem antrean tugas (queue) pada Laravel.
return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Bagian ini menentukan koneksi antrean utama yang digunakan Laravel
    | untuk mengelola tugas yang perlu diproses oleh aplikasi.
    |
    */

    // Mengambil jenis koneksi queue default dari file .env.
    // Jika tidak diatur, Laravel akan menggunakan database.
    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Bagian ini berisi konfigurasi berbagai layanan antrean
    | yang dapat digunakan oleh aplikasi Laravel.
    |
    */

    'connections' => [

        // Konfigurasi queue sync untuk menjalankan tugas secara langsung.
        'sync' => [
            'driver' => 'sync', // Menjalankan tugas langsung tanpa menyimpannya dalam antrean.
        ],

        // Konfigurasi queue menggunakan database.
        'database' => [
            'driver' => 'database', // Menggunakan database sebagai tempat penyimpanan antrean.
            'connection' => env('DB_QUEUE_CONNECTION'), // Menentukan koneksi database untuk queue.
            'table' => env('DB_QUEUE_TABLE', 'jobs'), // Menentukan nama tabel untuk menyimpan tugas antrean.
            'queue' => env('DB_QUEUE', 'default'), // Menentukan nama antrean yang digunakan.
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90), // Menentukan waktu dalam detik sebelum tugas yang belum selesai dapat dicoba kembali.
            'after_commit' => false, // Mengatur agar tugas dapat dimasukkan ke antrean sebelum transaksi database selesai.
        ],

        // Konfigurasi queue menggunakan layanan Beanstalkd.
        'beanstalkd' => [
            'driver' => 'beanstalkd', // Menggunakan Beanstalkd sebagai sistem antrean.
            'host' => env('BEANSTALKD_QUEUE_HOST', 'localhost'), // Menentukan alamat server Beanstalkd.
            'queue' => env('BEANSTALKD_QUEUE', 'default'), // Menentukan nama antrean yang digunakan.
            'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90), // Menentukan waktu sebelum tugas dapat dicoba kembali.
            'block_for' => 0, // Mengatur waktu tunggu worker ketika antrean kosong.
            'after_commit' => false, // Mengatur agar tugas tidak harus menunggu transaksi database selesai.
        ],

        // Konfigurasi queue menggunakan layanan Amazon SQS.
        'sqs' => [
            'driver' => 'sqs', // Menggunakan Amazon Simple Queue Service.
            'key' => env('AWS_ACCESS_KEY_ID'), // Mengambil access key AWS dari file .env.
            'secret' => env('AWS_SECRET_ACCESS_KEY'), // Mengambil secret key AWS dari file .env.
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'), // Menentukan alamat dasar layanan antrean SQS.
            'queue' => env('SQS_QUEUE', 'default'), // Menentukan nama antrean SQS.
            'suffix' => env('SQS_SUFFIX'), // Menentukan tambahan akhiran pada nama antrean jika digunakan.
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'), // Menentukan wilayah layanan AWS yang digunakan.
            'after_commit' => false, // Mengatur agar tugas tidak harus menunggu transaksi database selesai.
        ],

        // Konfigurasi queue menggunakan Redis.
        'redis' => [
            'driver' => 'redis', // Menggunakan Redis sebagai sistem antrean.
            'connection' => env('REDIS_QUEUE_CONNECTION', 'default'), // Menentukan koneksi Redis yang digunakan.
            'queue' => env('REDIS_QUEUE', 'default'), // Menentukan nama antrean Redis.
            'retry_after' => (int) env('REDIS_QUEUE_RETRY_AFTER', 90), // Menentukan waktu sebelum tugas dapat dicoba kembali.
            'block_for' => null, // Mengatur waktu tunggu worker ketika antrean kosong.
            'after_commit' => false, // Mengatur agar tugas tidak harus menunggu transaksi database selesai.
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Job Batching
    |--------------------------------------------------------------------------
    |
    | Bagian ini mengatur penyimpanan informasi kelompok tugas (job batching)
    | yang dijalankan secara bersamaan atau sebagai satu kelompok.
    |
    */

    // Mengatur database dan tabel untuk menyimpan informasi job batching.
    'batching' => [
        'database' => env('DB_CONNECTION', 'sqlite'), // Menentukan koneksi database untuk menyimpan informasi batching.
        'table' => 'job_batches', // Menentukan nama tabel penyimpanan informasi batching.
    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | Bagian ini mengatur penyimpanan informasi tugas antrean
    | yang mengalami kegagalan saat diproses.
    |
    */

    // Mengatur tempat penyimpanan data tugas yang gagal dijalankan.
    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'), // Menentukan metode penyimpanan data tugas yang gagal.
        'database' => env('DB_CONNECTION', 'sqlite'), // Menentukan koneksi database untuk menyimpan data kegagalan.
        'table' => 'failed_jobs', // Menentukan nama tabel untuk mencatat tugas yang gagal.
    ],

];