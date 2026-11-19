<?php

// Mengembalikan konfigurasi sistem pengiriman email pada Laravel.
return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | Bagian ini menentukan layanan pengiriman email utama
    | yang digunakan oleh aplikasi Laravel.
    |
    */

    // Mengambil jenis mailer default dari file .env.
    // Jika tidak diatur, Laravel menggunakan log.
    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Bagian ini berisi konfigurasi berbagai layanan pengiriman email
    | yang dapat digunakan oleh aplikasi Laravel.
    |
    */

    'mailers' => [

        // Konfigurasi pengiriman email menggunakan SMTP.
        'smtp' => [
            'transport' => 'smtp', // Menentukan metode pengiriman email menggunakan SMTP.
            'scheme' => env('MAIL_SCHEME'), // Mengambil skema koneksi email dari file .env.
            'url' => env('MAIL_URL'), // Mengambil URL koneksi mailer dari file .env.
            'host' => env('MAIL_HOST', '127.0.0.1'), // Menentukan alamat server SMTP.
            'port' => env('MAIL_PORT', 2525), // Menentukan port yang digunakan server SMTP.
            'username' => env('MAIL_USERNAME'), // Mengambil username akun email.
            'password' => env('MAIL_PASSWORD'), // Mengambil password akun email.
            'timeout' => null, // Mengatur batas waktu koneksi, dengan null berarti menggunakan pengaturan default.
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)), // Menentukan domain lokal yang digunakan saat proses identifikasi SMTP.
        ],

        // Konfigurasi pengiriman email menggunakan layanan Amazon SES.
        'ses' => [
            'transport' => 'ses', // Menentukan metode pengiriman email menggunakan Amazon SES.
        ],

        // Konfigurasi pengiriman email menggunakan layanan Postmark.
        'postmark' => [
            'transport' => 'postmark', // Menentukan metode pengiriman email menggunakan Postmark.
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'), // Mengatur ID aliran pesan Postmark jika digunakan.
            // 'client' => [
            //     'timeout' => 5, // Mengatur batas waktu koneksi client selama 5 detik jika diaktifkan.
            // ],
        ],

        // Konfigurasi pengiriman email menggunakan layanan Resend.
        'resend' => [
            'transport' => 'resend', // Menentukan metode pengiriman email menggunakan Resend.
        ],

        // Konfigurasi pengiriman email menggunakan Sendmail.
        'sendmail' => [
            'transport' => 'sendmail', // Menentukan metode pengiriman email menggunakan Sendmail.
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'), // Menentukan lokasi program Sendmail yang digunakan untuk mengirim email.
        ],

        // Konfigurasi untuk mencatat isi email ke dalam log, bukan mengirimkannya secara langsung.
        'log' => [
            'transport' => 'log', // Menentukan metode pencatatan email ke log.
            'channel' => env('MAIL_LOG_CHANNEL'), // Menentukan saluran log yang digunakan untuk mencatat email.
        ],

        // Konfigurasi untuk menyimpan email dalam bentuk array.
        'array' => [
            'transport' => 'array', // Menentukan metode penyimpanan email sementara dalam array.
        ],

        // Konfigurasi failover untuk menyediakan layanan pengiriman cadangan.
        'failover' => [
            'transport' => 'failover', // Menggunakan metode failover jika pengiriman email utama gagal.
            'mailers' => [
                'smtp', // Menggunakan SMTP sebagai layanan pengiriman pertama.
                'log', // Menggunakan log sebagai layanan cadangan.
            ],
        ],

        // Konfigurasi roundrobin untuk menggunakan beberapa layanan email secara bergantian.
        'roundrobin' => [
            'transport' => 'roundrobin', // Menggunakan metode pemilihan layanan secara bergantian.
            'mailers' => [
                'ses', // Menggunakan Amazon SES sebagai salah satu layanan pengiriman.
                'postmark', // Menggunakan Postmark sebagai layanan pengiriman lainnya.
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | Bagian ini menentukan alamat email dan nama pengirim default
    | yang digunakan untuk semua email yang dikirim oleh aplikasi.
    |
    */

    // Mengatur identitas pengirim email secara global.
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'), // Menentukan alamat email pengirim.
        'name' => env('MAIL_FROM_NAME', 'Example'), // Menentukan nama yang ditampilkan sebagai pengirim email.
    ],

];