<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Tambahkan ini untuk type-hinting

class PpdbInfo extends Model
{
    use HasFactory;

    protected $table = 'ppdb_info';

    protected $fillable = [
        'status',
        'tahun_ajaran',
        'rincian_biaya',
        'persyaratan',
        // 'kontak_whatsapp', // Bisa dihapus jika sudah pakai tabel contacts
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
}