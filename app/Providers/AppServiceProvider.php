<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Contact;
use App\Models\News;
use App\Models\PpdbInfo;
use App\Models\Prestasi;
use App\Models\PengumumanSekolah;
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
        if (Schema::hasTable('contacts')) {
            $kontak = Contact::first();
            View::share('kontak', $kontak);
        }

        // 3. Logika Notifikasi Badge & Multi-Update Toast
        if (!app()->runningInConsole()) {
            $threshold = now()->subDays(3);

            // Ambil 1 data terbaru dari masing-masing model
            $updates = collect();

            if (Schema::hasTable('news')) {
                $updates->push(News::latest()->first());
            }
            if (Schema::hasTable('pengumuman_sekolah')) {
                $updates->push(PengumumanSekolah::latest()->first());
            }
            if (Schema::hasTable('prestasis')) {
                $updates->push(Prestasi::latest()->first());
            }
            if (Schema::hasTable('ppdb_info')) {
                $updates->push(PpdbInfo::latest()->first());
            }

            // Bersihkan data null (jika tabel kosong) dan urutkan berdasarkan waktu terbaru
            $allUpdates = $updates->filter()->sortByDesc('created_at');

            View::share([
                // Badge Indikator (untuk Navbar/Menu)
                'hasNewBerita' => Schema::hasTable('news')
                    ? News::where('created_at', '>=', $threshold)->exists() : false,

                'hasNewPengumuman' => Schema::hasTable('pengumuman_sekolah')
                    ? PengumumanSekolah::where('created_at', '>=', $threshold)->exists() : false,

                'hasNewPrestasi' => Schema::hasTable('prestasis')
                    ? Prestasi::where('created_at', '>=', $threshold)->exists() : false,

                'hasNewPpdb' => Schema::hasTable('ppdb_info')
                    ? PpdbInfo::where('created_at', '>=', $threshold)->exists() : false,

                // Data Utama untuk Carousel Toast
                'allUpdates' => $allUpdates,
            ]);
        }
    }
}
