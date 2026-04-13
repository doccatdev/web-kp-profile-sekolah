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
            
            // Ambil 1 data terbaru dari masing-masing model untuk Carousel/Toast
            $updates = collect();

            if (Schema::hasTable('news')) {
                // Ambil berita terbaru yang sudah published tanpa batas waktu
                $latestNews = News::where('status', 'published')->latest()->first();
                if ($latestNews) $updates->push($latestNews);
            }
            if (Schema::hasTable('pengumuman_sekolah')) {
                $updates->push(PengumumanSekolah::latest()->first());
            }
            if (Schema::hasTable('prestasi')) {
                $updates->push(Prestasi::latest()->first());
            }
            if (Schema::hasTable('ppdb_info')) {
                $updates->push(PpdbInfo::latest()->first());
            }

            // Bersihkan data null dan urutkan berdasarkan yang terbaru dibuat
            $allUpdates = $updates->filter()->sortByDesc('created_at');

            View::share([
                // Badge Indikator: Cukup cek apakah ada data yang berstatus published
                'hasNewBerita' => Schema::hasTable('news')
                    ? News::where('status', 'published')->exists() : false,

                'hasNewPengumuman' => Schema::hasTable('pengumuman_sekolah')
                    ? PengumumanSekolah::exists() : false,

                'hasNewPrestasi' => Schema::hasTable('prestasi')
                    ? Prestasi::exists() : false,

                'hasNewPpdb' => Schema::hasTable('ppdb_info')
                    ? PpdbInfo::exists() : false,

                // Data Utama untuk Carousel Toast
                'allUpdates' => $allUpdates,
            ]);
        }
    }
}