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
            
            $updates = collect();

            // Ambil BERITA (Cuma yang statusnya published, ambil 3 terbaru)
            if (Schema::hasTable('news')) {
                $news = News::where('status', 'published')->latest()->take(3)->get();
                $updates = $updates->merge($news);
            }

            // Ambil PENGUMUMAN (Ambil 2 terbaru)
            if (Schema::hasTable('pengumuman_sekolah')) {
                $pengumuman = PengumumanSekolah::latest()->take(2)->get();
                $updates = $updates->merge($pengumuman);
            }

            // Ambil PRESTASI (Ambil 2 terbaru)
            if (Schema::hasTable('prestasi')) {
                $prestasi = Prestasi::latest()->take(2)->get();
                $updates = $updates->merge($prestasi);
            }

            // Ambil PPDB (Ambil 1 terbaru)
            if (Schema::hasTable('ppdb_info')) {
                $ppdb = PpdbInfo::latest()->take(1)->get();
                $updates = $updates->merge($ppdb);
            }

            // Urutkan semua gabungan data berdasarkan waktu terbaru
            $allUpdates = $updates->sortByDesc('created_at');

            View::share([
                // Badge Indikator Navbar
                'hasNewBerita' => Schema::hasTable('news') 
                    ? News::where('status', 'published')->exists() : false,

                'hasNewPengumuman' => Schema::hasTable('pengumuman_sekolah') 
                    ? PengumumanSekolah::exists() : false,

                'hasNewPrestasi' => Schema::hasTable('prestasi') 
                    ? Prestasi::exists() : false,

                'hasNewPpdb' => Schema::hasTable('ppdb_info') 
                    ? PpdbInfo::exists() : false,

                // Data untuk Carousel Toast di Frontend
                'allUpdates' => $allUpdates,
            ]);
        }
    }
}