<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name_category', 'slug'];

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function pengumuman()
    {
        // Ini akan bekerja setelah nama class model di atas kamu ubah
        return $this->hasMany(PengumumanSekolah::class, 'category_id');
    }
}
