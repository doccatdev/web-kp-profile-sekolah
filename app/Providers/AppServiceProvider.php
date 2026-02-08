<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // Pastikan ini ada

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Tetap kosongkan jika tidak ada service yang didaftarkan
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Mengatur Laravel agar menggunakan tampilan Bootstrap 5 untuk pagination
        Paginator::useBootstrapFive();
    }
}
