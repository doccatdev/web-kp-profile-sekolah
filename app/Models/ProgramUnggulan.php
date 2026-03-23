<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProgramUnggulan extends Model
{
    use HasFactory;

    protected $table = 'school_programs';

    protected $fillable = [
        'nama_program', 'slug', 'thumbnail', 'icon_class',
        'badge_text', 'deskripsi_singkat', 'deskripsi_program'
    ];

    public function galleries()
    {
        return $this->hasMany(ProgramUnggulanGalleri::class, 'school_programs_id');
    }

    protected static function booted()
    {
        // Berjalan saat create & update
        static::saving(function ($program) {
            // 1. Otomatis buat slug dari nama_program
            $program->slug = Str::slug($program->nama_program);

            // 2. Jika deskripsi_singkat kosong, ambil dari deskripsi_program
            if (empty($program->deskripsi_singkat)) {
                // Bersihkan HTML tag (antisipasi jika pakai Text Editor)
                $cleanText = strip_tags($program->deskripsi_program);

                // Ambil 20 kata pertama agar lebih informatif
                $program->deskripsi_singkat = Str::words($cleanText, 20, '...');
            }
        });

        // Hapus file saat data dihapus
        static::deleting(function ($program) {
            if ($program->thumbnail) {
                Storage::disk('public')->delete($program->thumbnail);
            }

            foreach ($program->galleries as $item) {
                $item->delete();
            }
        });

        // Hapus file lama saat foto diganti
        static::updating(function ($program) {
            if ($program->isDirty('thumbnail')) {
                $oldImage = $program->getOriginal('thumbnail');
                if ($oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });
    }
}
