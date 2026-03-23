<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'caption',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    protected static function booted()
    {
        // 1. Logika saat DELETING (Hapus semua file di public/sliders saat baris dihapus)
        static::deleting(function ($slider) {
            if (is_array($slider->images)) {
                foreach ($slider->images as $path) {
                    // Cek apakah file ada sebelum dihapus untuk menghindari error
                    if ($path && Storage::disk('public')->exists($path)) {
                        Storage::disk('public')->delete($path);
                    }
                }
            }
        });

        // 2. Logika saat UPDATING (Hapus file yang dibuang dari list images di Filament)
        static::updating(function ($slider) {
            // Hanya jalankan jika kolom images berubah
            if ($slider->isDirty('images')) {
                $oldImages = $slider->getOriginal('images') ?? [];
                $newImages = $slider->images ?? [];

                // Ambil file yang ada di data lama tapi tidak ada di data baru
                $deletedImages = array_diff((array)$oldImages, (array)$newImages);

                foreach ($deletedImages as $path) {
                    if ($path && Storage::disk('public')->exists($path)) {
                        Storage::disk('public')->delete($path);
                    }
                }
            }
        });
    }
}
