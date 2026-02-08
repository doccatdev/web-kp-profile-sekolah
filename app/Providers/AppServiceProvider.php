<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Contact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // 1. Pagination Bootstrap 5
        Paginator::useBootstrapFive();

        // 2. View Composer untuk Contact
        // Gunakan '*' agar variabel $kontak tersedia di SEMUA view (termasuk footer)
        if (Schema::hasTable('contacts')) {
            $kontak = Contact::first();
            View::share('kontak', $kontak);
        }
    }
}
