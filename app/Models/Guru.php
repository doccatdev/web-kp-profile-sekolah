<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    protected static function boot()
    {
        parent::boot();

        // Menggunakan saving agar saat edit nama, slug juga bisa diperbarui
        static::saving(function ($teacher) {
            if (empty($teacher->slug) || $teacher->isDirty('nama')) {
                $teacher->slug = Str::slug($teacher->nama);
            }
        });
    }
}
