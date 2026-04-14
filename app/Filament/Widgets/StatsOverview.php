<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Guru;
use App\Models\News;
use App\Models\Prestasi;
use Illuminate\Support\Facades\Auth;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';

    protected function getStats(): array
    {
        $user = Auth::user();

        // LOGIKA UNTUK ADMIN
        if ($user->hasRole('admin') || $user->hasRole('super_admin')) {
            $jumlahGuru = Guru::count();
            $jumlahBeritaPublished = News::where('status', 'published')->count();
            $jumlahBeritaPending = News::where('status', 'pending')->count();
            $jumlahBeritaRejected = News::where('status', 'rejected')->count(); // Tambahan Admin
            $jumlahPrestasi = Prestasi::count();

            return [
                Stat::make('Total Guru & Staf', $jumlahGuru)
                    ->description('Personel terdata')
                    ->descriptionIcon('heroicon-m-users')
                    ->color('success'),

                Stat::make('Berita Publik (Total)', $jumlahBeritaPublished)
                    ->description($jumlahBeritaPending . ' butuh approval, ' . $jumlahBeritaRejected . ' ditolak')
                    ->descriptionIcon('heroicon-m-newspaper')
                    ->color($jumlahBeritaPending > 0 ? 'warning' : 'info'),

                Stat::make('Total Prestasi', $jumlahPrestasi)
                    ->description('Seluruh pencapaian sekolah')
                    ->descriptionIcon('heroicon-m-academic-cap')
                    ->color('warning'),
            ];
        }

        // LOGIKA UNTUK GURU
        if ($user->hasRole('teacher')) {
            // Filter berdasarkan author_id (milik guru yang sedang login)
            $myPublished = News::where('author_id', $user->id)->where('status', 'published')->count();
            $myPending = News::where('author_id', $user->id)->where('status', 'pending')->count();
            $myRejected = News::where('author_id', $user->id)->where('status', 'rejected')->count(); // Tambahan Guru
            
            return [
                Stat::make('Artikel Saya (Terbit)', $myPublished)
                    ->description('Berita yang sudah tayang')
                    ->descriptionIcon('heroicon-m-check-badge')
                    ->color('success'),

                Stat::make('Menunggu Moderasi', $myPending)
                    ->description('Sedang diperiksa oleh admin')
                    ->descriptionIcon('heroicon-m-clock')
                    ->color('warning'),

                // STAT BARU UNTUK ARTIKEL DITOLAK
                Stat::make('Artikel Ditolak', $myRejected)
                    ->description($myRejected > 0 ? 'Perlu perbaikan segera' : 'Tidak ada penolakan')
                    ->descriptionIcon('heroicon-m-x-circle')
                    ->color($myRejected > 0 ? 'danger' : 'gray'),
            ];
        }

        return [];
    }
}