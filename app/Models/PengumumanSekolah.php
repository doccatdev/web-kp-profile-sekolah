<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// GANTI NAMA CLASS DISINI DARI Announcement MENJADI PengumumanSekolah
class PengumumanSekolah extends Model
{
    use HasFactory;

    // Tetap gunakan ini karena nama tabel kamu snake_case manual
    protected $table = 'pengumuman_sekolah';

    protected $fillable = [
        'judul_pengumuman',
        'category_id',
        'slug',
        'thumbnail',
        'deskripsi_singkat',
        'isi_pengumuman',
        'posted_at',
    ];

    protected $casts = [
        'posted_at' => 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected static function booted()
    {
        static::saving(function ($item) {
            if ($item->isDirty('judul_pengumuman')) {
                $item->slug = Str::slug($item->judul_pengumuman);
            }

            if (empty($item->deskripsi_singkat)) {
                $item->deskripsi_singkat = Str::of(strip_tags($item->isi_pengumuman))->limit(150);
            }
        });

        static::deleting(function ($item) {
            if ($item->thumbnail) {
                Storage::disk('public')->delete($item->thumbnail);
            }
        });

        static::updating(function ($item) {
            if ($item->isDirty('thumbnail')) {
                $oldThumbnail = $item->getOriginal('thumbnail');
                if ($oldThumbnail) {
                    Storage::disk('public')->delete($oldThumbnail);
                }
            }
        });
    }
}
