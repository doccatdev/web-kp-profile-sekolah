<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Guru;
use App\Models\News;
use App\Models\Prestasi;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';

    protected function getStats(): array
    {
        // Mengambil jumlah data dari masing-masing model
        $jumlahGuru = Guru::count();
        $jumlahBerita = News::count();
        $jumlahPrestasi = Prestasi::count();

        return [
            Stat::make('Total Guru & Staf', $jumlahGuru)
                ->description('Personel terdata')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),

            Stat::make('Total Berita', $jumlahBerita)
                ->description('Artikel yang dipublikasikan')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info'),

            Stat::make('Total Prestasi', $jumlahPrestasi)
                ->description('Pencapaian sekolah')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('warning'),
        ];
    }
}
