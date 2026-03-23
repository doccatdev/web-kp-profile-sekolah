<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'facilities';
    protected $fillable = [
        'nama_fasilitas', 'slug', 'icon_class',
        'deskripsi_singkat', 'deskripsi_fasilitas', 'thumbnail'
    ];

    public function galeri()
    {
        return $this->hasMany(FasilitasGaleri::class, 'facilities_id');
    }

    protected static function booted()
    {
        // Menggunakan saving agar mencakup kejadian creating & updating
        static::saving(function ($fasilitas) {
            // 1. Otomatis buat Slug dari nama
            $fasilitas->slug = Str::slug($fasilitas->nama_fasilitas);

            // 2. Jika deskripsi_singkat kosong, ambil dari deskripsi_fasilitas
            if (empty($fasilitas->deskripsi_singkat)) {
                // strip_tags agar tidak ada HTML yang ikut (seperti <p> atau <strong>)
                $cleanText = strip_tags($fasilitas->deskripsi_fasilitas);

                // Ambil 20 kata pertama
                $fasilitas->deskripsi_singkat = Str::words($cleanText, 20, '...');
            }
        });

        static::deleting(function ($fasilitas) {
            if ($fasilitas->thumbnail) {
                Storage::disk('public')->delete($fasilitas->thumbnail);
            }

            foreach ($fasilitas->galeri as $item) {
                $item->delete();
            }
        });

        static::updating(function ($fasilitas) {
            if ($fasilitas->isDirty('thumbnail')) {
                // Hapus file lama jika ada upload thumbnail baru
                $oldImage = $fasilitas->getOriginal('thumbnail');
                if ($oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });
    }
}
