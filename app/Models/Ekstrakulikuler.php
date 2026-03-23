<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Ekstrakulikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakulikuler';

    protected $fillable = [
        'nama_ekskul',
        'slug',
        'thumbnail',
        'icon_class',
        'deskripsi_singkat',
        'deskripsi_ekstrakulikuler',
        'pembina',
    ];

    public function photos()
    {
        // Pastikan nama foreign_key nya 'ekstrakulikuler_id' sesuai migration kamu tadi
        return $this->hasMany(EkstrakulikulerGalery::class, 'ekstrakulikuler_id');
    }

    protected static function booted()
    {
        static::saving(function ($item) {
            // Otomatis buat slug dari nama_ekskul
            if ($item->isDirty('nama_ekskul')) {
                $item->slug = Str::slug($item->nama_ekskul);
            }

            // Otomatis buat deskripsi singkat jika kosong (diambil dari deskripsi_ekstrakulikuler)
            if (empty($item->deskripsi_singkat) && $item->deskripsi_ekstrakulikuler) {
                $item->deskripsi_singkat = Str::of(strip_tags($item->deskripsi_ekstrakulikuler))->limit(150);
            }
        });

        static::deleting(function ($item) {
            // Hapus file thumbnail dari storage saat data dihapus
            if ($item->thumbnail) {
                Storage::disk('public')->delete($item->thumbnail);
            }

            // Tambahan: Hapus juga semua foto di galeri terkait
            foreach ($item->photos as $photo) {
                if ($photo->foto) {
                    Storage::disk('public')->delete($photo->foto);
                }
            }
        });

        static::updating(function ($item) {
            // Hapus thumbnail lama jika diganti dengan foto baru
            if ($item->isDirty('thumbnail')) {
                $oldThumbnail = $item->getOriginal('thumbnail');
                if ($oldThumbnail) {
                    Storage::disk('public')->delete($oldThumbnail);
                }
            }
        });
    }
}
