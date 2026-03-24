<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class PrestasiGalery extends Model
{
    use HasFactory;

    protected $table = 'prestasi_photos';

    protected $fillable = [
        'prestasi_id',
        'foto',
        'caption',
    ];

    // Relasi balik ke Prestasi
    public function prestasi(): BelongsTo
    {
        return $this->belongsTo(Prestasi::class, 'prestasi_id');
    }

    /**
     * Logic otomatis saat record dimanipulasi
     */
    protected static function booted()
    {
        // Aksi saat foto dihapus dari database (lewat tombol hapus di Filament)
        static::deleting(function ($galeri) {
            if ($galeri->foto) {
                Storage::disk('public')->delete($galeri->foto);
            }
        });

        // Aksi saat foto diganti dengan file baru (Update)
        static::updating(function ($galeri) {
            if ($galeri->isDirty('foto')) {
                $oldFoto = $galeri->getOriginal('foto');
                if ($oldFoto) {
                    Storage::disk('public')->delete($oldFoto);
                }
            }
        });
    }
}
