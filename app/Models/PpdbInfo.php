<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpdbInfo extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan jamak dari nama model
    protected $table = 'ppdb_info';

    // Masukkan kolom yang boleh diisi (Fillable)
    protected $fillable = [
        'status',
        'tahun_ajaran',
        'rincian_biaya',
        'persyaratan',
        'kontak_whatsapp',
        'gambar_brosur',
    ];

    // Scope untuk mempermudah pemanggilan data yang statusnya 'Buka'
    public function scopeActive($query)
    {
        return $query->where('status', 'Buka');
    }
}
