<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // INI YANG BENER, bukan App\Models\Str

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasi';

    protected $fillable = [
        'judul',
        'slug',
        'tingkat',
        'kategori_prestasi',
        'thumbnail',
        'deskripsi_singkat',
        'konten',
        'tanggal_posting',
    ];


    public function photos(): HasMany
    {
        // Pastikan nama modelnya benar: PrestasiGalery atau PrestasiPhoto?
        // Sesuaikan dengan nama file model galeri lu.
        return $this->hasMany(PrestasiGalery::class, 'prestasi_id');
    }

    protected static function booted()
    {
        static::saving(function ($prestasi) {
            // Otomatis buat Slug
            $prestasi->slug = Str::slug($prestasi->judul);

            // Otomatis buat deskripsi singkat jika kosong
            if (empty($prestasi->deskripsi_singkat) && !empty($prestasi->konten)) {
                $cleanText = strip_tags($prestasi->konten);
                $prestasi->deskripsi_singkat = Str::limit($cleanText, 150); // Pake limit biar lebih aman
            }
        });

        static::deleting(function ($prestasi) {
            if ($prestasi->thumbnail) {
                Storage::disk('public')->delete($prestasi->thumbnail);
            }

            // Hapus foto-foto galeri di storage
            foreach ($prestasi->photos as $item) {
                $item->delete();
            }
        });

        static::updating(function ($prestasi) {
            if ($prestasi->isDirty('thumbnail')) {
                $oldImage = $prestasi->getOriginal('thumbnail');
                if ($oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });
    }
}
