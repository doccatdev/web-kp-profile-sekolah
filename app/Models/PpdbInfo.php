<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage; // Penting untuk hapus file brosur

class PpdbInfo extends Model
{
    use HasFactory;

    protected $table = 'ppdb_info';

    protected $fillable = [
        'status',
        'tahun_ajaran',
        'rincian_biaya',
        'persyaratan',
        'gambar_brosur',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'Buka');
    }

    /**
     * Relasi ke banyak kontak admin.
     */
    public function contacts(): HasMany
    {
        return $this->hasMany(PpdbContact::class, 'ppdb_info_id');
    }

    protected static function booted()
    {
        // 1. Logika saat data DIHAPUS (Deleting)
        static::deleting(function ($ppdb) {
            // Hapus file fisik brosur jika ada
            if ($ppdb->gambar_brosur) {
                Storage::disk('public')->delete($ppdb->gambar_brosur);
            }

            // Hapus semua kontak terkait di database
            // (Jika di migration belum pakai onDelete('cascade'))
            $ppdb->contacts()->delete();
        });

        // 2. Logika saat data DIUPDATE (Updating)
        static::updating(function ($ppdb) {
            // Jika user mengunggah brosur baru, hapus brosur lama
            if ($ppdb->isDirty('gambar_brosur')) {
                $oldBrosur = $ppdb->getOriginal('gambar_brosur');

                if ($oldBrosur) {
                    Storage::disk('public')->delete($oldBrosur);
                }
            }
        });
    }
}
