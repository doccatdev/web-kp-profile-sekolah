<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EkstrakulikulerGalery extends Model
{
    use HasFactory;

    protected $table = 'ekstrakulikuler_photos';

    protected $fillable = ['ekstrakulikuler_id', 'foto', 'caption'];

    /**
     * Relasi balik ke Ekstrakulikuler
     */
    public function ekstrakulikuler()
    {
        return $this->belongsTo(Ekstrakulikuler::class, 'ekstrakulikuler_id');
    }

    protected static function booted()
    {
        // Hapus file fisik saat data galeri dihapus (misal hapus satu foto dari Filament)
        static::deleting(function ($galeri) {
            if ($galeri->foto) {
                Storage::disk('public')->delete($galeri->foto);
            }
        });

        // Hapus file fisik lama jika foto diupdate/diganti
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
