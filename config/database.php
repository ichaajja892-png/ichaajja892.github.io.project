<?php

// Mengimpor class Str dari Laravel untuk mengolah teks.
use Illuminate\Support\Str;

// Mengembalikan konfigurasi database yang digunakan aplikasi Laravel.
return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Bagian ini menentukan koneksi database utama yang akan digunakan
    | aplikasi ketika menjalankan operasi database.
    |
    */

    // Mengambil jenis koneksi database dari file .env.
    // Jika tidak diatur, Laravel akan menggunakan SQLite.
    'default' => env('DB_CONNECTION', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Bagian ini berisi pengaturan berbagai jenis database
    | yang dapat digunakan oleh aplikasi Laravel.
    |
    */

    'connections' => [

        // Konfigurasi koneksi database SQLite.
        'sqlite' => [
            'driver' => 'sqlite', // Menentukan jenis database SQLite.
            'url' => env('DB_URL'), // Mengambil URL koneksi database dari .env.
            'database' => env('DB_DATABASE', database_path('database.sqlite')), // Menentukan lokasi file database SQLite.
            'prefix' => '', // Tidak menggunakan awalan khusus pada nama tabel.
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true), // Mengaktifkan atau menonaktifkan aturan foreign key.
            'busy_timeout' => null, // Mengatur batas waktu ketika database sedang digunakan.
            'journal_mode' => null, // Mengatur mode pencatatan perubahan database.
            'synchronous' => null, // Mengatur tingkat sinkronisasi penulisan data.
        ],

        // Konfigurasi koneksi database MySQL.
        'mysql' => [
            'driver' => 'mysql', // Menentukan jenis database MySQL.
            'url' => env('DB_URL'), // Mengambil URL koneksi database dari .env.
            'host' => env('DB_HOST', '127.0.0.1'), // Menentukan alamat server database.
            'port' => env('DB_PORT', '3306'), // Menentukan port yang digunakan MySQL.
            'database' => env('DB_DATABASE', 'laravel'), // Menentukan nama database.
            'username' => env('DB_USERNAME', 'root'), // Menentukan username database.
            'password' => env('DB_PASSWORD', ''), // Menentukan password database.
            'unix_socket' => env('DB_SOCKET', ''), // Mengatur alamat socket jika digunakan.
            'charset' => env('DB_CHARSET', 'utf8mb4'), // Mengatur karakter yang dapat disimpan database.
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'), // Mengatur aturan perbandingan dan pengurutan teks.
            'prefix' => '', // Tidak menggunakan awalan khusus pada nama tabel.
            'prefix_indexes' => true, // Mengaktifkan penggunaan prefix pada indeks tabel.
            'strict' => true, // Mengaktifkan mode strict agar aturan database lebih ketat.
            'engine' => null, // Menggunakan storage engine bawaan MySQL.
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                // Mengatur opsi SSL apabila ekstensi PDO MySQL tersedia.
                Pdo\Mysql::ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [], // Jika PDO MySQL tidak tersedia, opsi koneksi dikosongkan.
        ],

        // Konfigurasi koneksi database MariaDB.
        'mariadb' => [
            'driver' => 'mariadb', // Menentukan jenis database MariaDB.
            'url' => env('DB_URL'), // Mengambil URL koneksi database dari .env.
            'host' => env('DB_HOST', '127.0.0.1'), // Menentukan alamat server database.
            'port' => env('DB_PORT', '3306'), // Menentukan port yang digunakan MariaDB.
            'database' => env('DB_DATABASE', 'laravel'), // Menentukan nama database.
            'username' => env('DB_USERNAME', 'root'), // Menentukan username database.
            'password' => env('DB_PASSWORD', ''), // Menentukan password database.
            'unix_socket' => env('DB_SOCKET', ''), // Mengatur alamat socket jika digunakan.
            'charset' => env('DB_CHARSET', 'utf8mb4'), // Mengatur karakter yang dapat disimpan database.
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'), // Mengatur aturan perbandingan dan pengurutan teks.
            'prefix' => '', // Tidak menggunakan awalan khusus pada nama tabel.
            'prefix_indexes' => true, // Mengaktifkan penggunaan prefix pada indeks tabel.
            'strict' => true, // Mengaktifkan mode strict database.
            'engine' => null, // Menggunakan storage engine bawaan MariaDB.
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                // Mengatur opsi SSL apabila ekstensi PDO MySQL tersedia.
                Pdo\Mysql::ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [], // Jika PDO MySQL tidak tersedia, opsi koneksi dikosongkan.
        ],

        // Konfigurasi koneksi database PostgreSQL.
        'pgsql' => [
            'driver' => 'pgsql', // Menentukan jenis database PostgreSQL.
            'url' => env('DB_URL'), // Mengambil URL koneksi database dari .env.
            'host' => env('DB_HOST', '127.0.0.1'), // Menentukan alamat server database.
            'port' => env('DB_PORT', '5432'), // Menentukan port PostgreSQL.
            'database' => env('DB_DATABASE', 'laravel'), // Menentukan nama database.
            'username' => env('DB_USERNAME', 'root'), // Menentukan username database.
            'password' => env('DB_PASSWORD', ''), // Menentukan password database.
            'charset' => env('DB_CHARSET', 'utf8'), // Mengatur karakter yang digunakan database.
            'prefix' => '', // Tidak menggunakan awalan khusus pada nama tabel.
            'prefix_indexes' => true, // Mengaktifkan penggunaan prefix pada indeks tabel.
            'search_path' => 'public', // Menentukan schema yang digunakan PostgreSQL.
            'sslmode' => 'prefer', // Mengutamakan koneksi SSL jika tersedia.
        ],

        // Konfigurasi koneksi database SQL Server.
        'sqlsrv' => [
            'driver' => 'sqlsrv', // Menentukan jenis database SQL Server.
            'url' => env('DB_URL'), // Mengambil URL koneksi database dari .env.
            'host' => env('DB_HOST', 'localhost'), // Menentukan alamat server database.
            'port' => env('DB_PORT', '1433'), // Menentukan port SQL Server.
            'database' => env('DB_DATABASE', 'laravel'), // Menentukan nama database.
            'username' => env('DB_USERNAME', 'root'), // Menentukan username database.
            'password' => env('DB_PASSWORD', ''), // Menentukan password database.
            'charset' => env('DB_CHARSET', 'utf8'), // Mengatur karakter yang digunakan database.
            'prefix' => '', // Tidak menggunakan awalan khusus pada nama tabel.
            'prefix_indexes' => true, // Mengaktifkan penggunaan prefix pada indeks tabel.
            // 'encrypt' => env('DB_ENCRYPT', 'yes'), // Mengatur enkripsi koneksi jika diaktifkan.
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'), // Mengatur kepercayaan terhadap sertifikat server.
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | Bagian ini digunakan untuk mencatat migration yang sudah dijalankan
    | pada database aplikasi.
    |
    */

    // Mengatur tabel yang digunakan untuk menyimpan riwayat migration.
    'migrations' => [
        'table' => 'migrations', // Nama tabel untuk mencatat migration.
        'update_date_on_publish' => true, // Mengatur pembaruan tanggal ketika migration dipublikasikan.
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Bagian ini berisi konfigurasi koneksi Redis yang dapat digunakan
    | sebagai penyimpanan data berbasis key-value.
    |
    */

    'redis' => [

        // Menentukan client Redis yang digunakan aplikasi.
        'client' => env('REDIS_CLIENT', 'phpredis'),

        // Mengatur pilihan tambahan untuk koneksi Redis.
        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'), // Menentukan konfigurasi cluster Redis.
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'), // Membuat awalan nama key berdasarkan nama aplikasi.
            'persistent' => env('REDIS_PERSISTENT', false), // Mengatur apakah koneksi Redis bersifat tetap.
        ],

        // Konfigurasi koneksi Redis utama.
        'default' => [
            'url' => env('REDIS_URL'), // Mengambil URL koneksi Redis.
            'host' => env('REDIS_HOST', '127.0.0.1'), // Menentukan alamat server Redis.
            'username' => env('REDIS_USERNAME'), // Mengambil username Redis.
            'password' => env('REDIS_PASSWORD'), // Mengambil password Redis.
            'port' => env('REDIS_PORT', '6379'), // Menentukan port Redis.
            'database' => env('REDIS_DB', '0'), // Menentukan nomor database Redis utama.
        ],

        // Konfigurasi Redis yang khusus digunakan untuk cache.
        'cache' => [
            'url' => env('REDIS_URL'), // Mengambil URL koneksi Redis.
            'host' => env('REDIS_HOST', '127.0.0.1'), // Menentukan alamat server Redis.
            'username' => env('REDIS_USERNAME'), // Mengambil username Redis.
            'password' => env('REDIS_PASSWORD'), // Mengambil password Redis.
            'port' => env('REDIS_PORT', '6379'), // Menentukan port Redis.
            'database' => env('REDIS_CACHE_DB', '1'), // Menentukan nomor database Redis untuk cache.
        ],

    ],

];