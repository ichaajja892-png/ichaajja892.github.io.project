<?php

// Mengembalikan konfigurasi layanan pihak ketiga yang digunakan aplikasi Laravel.
return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | Bagian ini digunakan untuk menyimpan konfigurasi dan kredensial
    | layanan pihak ketiga yang terhubung dengan aplikasi Laravel.
    |
    */

    // Konfigurasi layanan Postmark untuk pengiriman email.
    'postmark' => [
        'token' => env('POSTMARK_TOKEN'), // Mengambil token autentikasi Postmark dari file .env.
    ],

    // Konfigurasi layanan Amazon Simple Email Service (SES).
    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'), // Mengambil access key AWS dari file .env.
        'secret' => env('AWS_SECRET_ACCESS_KEY'), // Mengambil secret key AWS dari file .env.
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'), // Menentukan wilayah layanan AWS yang digunakan.
    ],

    // Konfigurasi layanan Resend untuk pengiriman email.
    'resend' => [
        'key' => env('RESEND_KEY'), // Mengambil API key Resend dari file .env.
    ],

    // Konfigurasi layanan Slack untuk mengirim notifikasi.
    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'), // Mengambil token autentikasi bot Slack dari file .env.
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'), // Menentukan channel Slack tujuan pengiriman notifikasi.
        ],
    ],

];