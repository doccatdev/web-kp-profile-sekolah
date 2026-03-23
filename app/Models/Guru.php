<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // Penting untuk menghapus file foto

class Guru extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $fillable = [
        'nama',
        'slug',
        'foto',
        'jabatan',
        'mata_pelajaran',
    ];

    protected static function booted()
    {
        // 1. Logika saat SAVING (Auto Slug)
        static::saving(function ($teacher) {
            // Jika nama berubah, slug otomatis diperbarui
            if ($teacher->isDirty('nama')) {
                $teacher->slug = Str::slug($teacher->nama);
            }
        });

        // 2. Logika saat DELETING (Hapus file fisik saat data dihapus)
        static::deleting(function ($teacher) {
            if ($teacher->foto) {
                Storage::disk('public')->delete($teacher->foto);
            }
        });

        // 3. Logika saat UPDATING (Hapus foto lama jika ganti foto baru)
        static::updating(function ($teacher) {
            if ($teacher->isDirty('foto')) {
                $oldFoto = $teacher->getOriginal('foto');

                if ($oldFoto) {
                    Storage::disk('public')->delete($oldFoto);
                }
            }
        });
    }
}
