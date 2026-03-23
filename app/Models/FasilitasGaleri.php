<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FasilitasGaleri extends Model
{
    use HasFactory;

    protected $table = 'facilities_photos';
    protected $fillable = ['facilities_id', 'image', 'caption'];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'facilities_id');
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
