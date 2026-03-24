<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // WAJIB ADA

class Category extends Model
{
    use HasFactory;

    
    protected $fillable = ['name_category', 'slug', 'type'];

    /**
     * Relasi ke News (Sudah ada di kode lu sebelumnya)
     */
    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id');
    }

    /**
     * Relasi ke Prestasi (INI YANG HILANG)
     */
    public function prestasi    (): HasMany
    {
        // Pastikan nama modelnya 'Prestasi'
        return $this->hasMany(Prestasi::class, 'category_id');
    }
}
