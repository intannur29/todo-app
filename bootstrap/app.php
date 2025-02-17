<?php

// Mengimpor kelas-kelas yang dibutuhkan
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Membuat dan mengonfigurasi aplikasi Laravel dengan berbagai pengaturan
return Application::configure(basePath: dirname(__DIR__)) // Menentukan base path aplikasi dengan mengambil direktori satu tingkat di atas file ini
    ->withRouting(
        web: __DIR__.'/../routes/web.php', // Menentukan lokasi file routing untuk web
        commands: __DIR__.'/../routes/console.php', // Menentukan lokasi file routing untuk perintah console
        health: '/up', // Menentukan endpoint untuk pemeriksaan status (health check) aplikasi
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Di sini dapat menambahkan middleware yang digunakan di aplikasi
        // Middleware bertugas untuk menangani permintaan HTTP sebelum mencapai kontroler
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Di sini dapat menangani pengecualian (exceptions) yang terjadi di aplikasi
        // Pengaturan ini memungkinkan Anda untuk mengonfigurasi penanganan kesalahan
    })
    ->create(); // Membuat aplikasi berdasarkan konfigurasi yang telah diberikan
