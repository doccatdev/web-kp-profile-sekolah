<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProgramUnggulanGalleri extends Model
{
    use HasFactory;

    protected $table = 'school_programs_photos';

    protected $fillable = ['school_programs_id', 'image', 'caption'];

    public function program()
    {
        return $this->belongsTo(ProgramUnggulan::class, 'school_programs_id');
    }

    protected static function booted()
    {
        static::deleting(function ($galeri) {
            if ($galeri->image) {
                Storage::disk('public')->delete($galeri->image);
            }
        });

        static::updating(function ($galeri) {
            if ($galeri->isDirty('image')) {
                Storage::disk('public')->delete($galeri->getOriginal('image'));
            }
        });
    }
}
