<?php

// Mengimpor handler NullHandler untuk mengabaikan pesan log.
use Monolog\Handler\NullHandler;

// Mengimpor handler StreamHandler untuk menulis log ke aliran tertentu.
use Monolog\Handler\StreamHandler;

// Mengimpor handler SyslogUdpHandler untuk mengirim log melalui protokol Syslog UDP.
use Monolog\Handler\SyslogUdpHandler;

// Mengimpor processor untuk memproses pesan log dengan format PSR.
use Monolog\Processor\PsrLogMessageProcessor;

// Mengembalikan konfigurasi sistem logging pada Laravel.
return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | Bagian ini menentukan saluran utama yang digunakan aplikasi
    | untuk menyimpan atau mengirim pesan log.
    |
    */

    // Mengambil saluran log default dari file .env.
    // Jika tidak diatur, Laravel akan menggunakan stack.
    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | Bagian ini mengatur saluran untuk mencatat peringatan
    | tentang fitur PHP atau library yang sudah tidak direkomendasikan.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'), // Menentukan saluran untuk mencatat peringatan fitur yang sudah usang.
        'trace' => env('LOG_DEPRECATIONS_TRACE', false), // Mengatur apakah informasi jejak pemanggilan ikut dicatat.
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Bagian ini berisi berbagai konfigurasi saluran logging.
    | Laravel menggunakan library Monolog untuk mengelola pencatatan log.
    |
    */

    'channels' => [

        // Konfigurasi saluran stack untuk menggabungkan beberapa saluran log.
        'stack' => [
            'driver' => 'stack', // Menggunakan driver stack.
            'channels' => explode(',', env('LOG_STACK', 'single')), // Mengambil daftar saluran log dari .env dan memisahkannya berdasarkan koma.
            'ignore_exceptions' => false, // Tidak mengabaikan exception yang terjadi saat proses pencatatan log.
        ],

        // Konfigurasi single untuk menyimpan seluruh log dalam satu file.
        'single' => [
            'driver' => 'single', // Menggunakan driver single.
            'path' => storage_path('logs/laravel.log'), // Menentukan lokasi file penyimpanan log.
            'level' => env('LOG_LEVEL', 'debug'), // Menentukan tingkat pesan log yang akan dicatat.
            'replace_placeholders' => true, // Mengganti placeholder pada pesan log dengan nilai sebenarnya.
        ],

        // Konfigurasi daily untuk menyimpan log berdasarkan tanggal.
        'daily' => [
            'driver' => 'daily', // Menggunakan driver daily.
            'path' => storage_path('logs/laravel.log'), // Menentukan lokasi penyimpanan file log harian.
            'level' => env('LOG_LEVEL', 'debug'), // Menentukan tingkat pesan log yang akan dicatat.
            'days' => env('LOG_DAILY_DAYS', 14), // Menentukan jumlah hari file log disimpan sebelum dibersihkan.
            'replace_placeholders' => true, // Mengganti placeholder pada pesan log dengan nilai sebenarnya.
        ],

        // Konfigurasi untuk mengirim pesan log ke aplikasi Slack.
        'slack' => [
            'driver' => 'slack', // Menggunakan driver Slack.
            'url' => env('LOG_SLACK_WEBHOOK_URL'), // Mengambil URL webhook Slack dari file .env.
            'username' => env('LOG_SLACK_USERNAME', 'Laravel Log'), // Menentukan nama pengirim pesan log.
            'emoji' => env('LOG_SLACK_EMOJI', ':boom:'), // Menentukan emoji yang digunakan pada pesan log.
            'level' => env('LOG_LEVEL', 'critical'), // Menentukan tingkat pesan log yang dikirim ke Slack.
            'replace_placeholders' => true, // Mengganti placeholder pada pesan log dengan nilai sebenarnya.
        ],

        // Konfigurasi untuk mengirim log ke layanan Papertrail.
        'papertrail' => [
            'driver' => 'monolog', // Menggunakan driver Monolog.
            'level' => env('LOG_LEVEL', 'debug'), // Menentukan tingkat pesan log yang akan dicatat.
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class), // Menentukan handler untuk mengirim log ke Papertrail.
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'), // Mengambil alamat server Papertrail.
                'port' => env('PAPERTRAIL_PORT'), // Mengambil port server Papertrail.
                'connectionString' => 'tls://'.env('PAPERTRAIL_URL').':'.env('PAPERTRAIL_PORT'), // Membuat alamat koneksi TLS ke Papertrail.
            ],
            'processors' => [PsrLogMessageProcessor::class], // Memproses pesan log menggunakan format PSR.
        ],

        // Konfigurasi untuk mengirim log melalui aliran stderr.
        'stderr' => [
            'driver' => 'monolog', // Menggunakan driver Monolog.
            'level' => env('LOG_LEVEL', 'debug'), // Menentukan tingkat pesan log yang akan dicatat.
            'handler' => StreamHandler::class, // Menggunakan StreamHandler untuk menulis pesan log.
            'formatter' => env('LOG_STDERR_FORMATTER'), // Mengatur format pesan log dari file .env.
            'with' => [
                'stream' => 'php://stderr', // Menentukan aliran keluaran standar untuk pesan error.
            ],
            'processors' => [PsrLogMessageProcessor::class], // Memproses pesan log menggunakan format PSR.
        ],

        // Konfigurasi untuk mengirim log ke sistem Syslog.
        'syslog' => [
            'driver' => 'syslog', // Menggunakan driver Syslog.
            'level' => env('LOG_LEVEL', 'debug'), // Menentukan tingkat pesan log yang akan dicatat.
            'facility' => env('LOG_SYSLOG_FACILITY', LOG_USER), // Menentukan kategori sumber pesan log pada Syslog.
            'replace_placeholders' => true, // Mengganti placeholder pada pesan log dengan nilai sebenarnya.
        ],

        // Konfigurasi untuk mencatat log menggunakan sistem error log PHP.
        'errorlog' => [
            'driver' => 'errorlog', // Menggunakan driver errorlog.
            'level' => env('LOG_LEVEL', 'debug'), // Menentukan tingkat pesan log yang akan dicatat.
            'replace_placeholders' => true, // Mengganti placeholder pada pesan log dengan nilai sebenarnya.
        ],

        // Konfigurasi untuk mengabaikan pesan log.
        'null' => [
            'driver' => 'monolog', // Menggunakan driver Monolog.
            'handler' => NullHandler::class, // Menggunakan NullHandler agar pesan log tidak disimpan.
        ],

        // Konfigurasi saluran darurat ketika saluran log utama tidak dapat digunakan.
        'emergency' => [
            'path' => storage_path('logs/laravel.log'), // Menentukan lokasi file untuk menyimpan log darurat.
        ],

    ],

];