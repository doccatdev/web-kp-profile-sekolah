<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
use App\Models\FasilitasGaleri;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'facilities';
    protected $fillable = ['nama_fasilitas', 'slug', 'icon_class', 'deskripsi_singkat', 'deskripsi_fasilitas', 'thumbnail'];

    public function galeri()
    {

        return $this->hasMany(FasilitasGaleri::class, 'facilities_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(fn($f) => $f->slug = Str::slug($f->nama_fasilitas));
    }
}
