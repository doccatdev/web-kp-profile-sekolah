<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage; // Penting untuk hapus file
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    // Memberitahu Laravel kolom ini adalah Tanggal
    protected $casts = [
        'posted_at' => 'date',
    ];

    protected $fillable = [
        'news_title',
        'short_description',
        'category_id',
        'slug',
        'news_content',
        'image',
        'posted_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments() :HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function approvedComments()
{

    return $this->hasMany(Comment::class)->approved();
}

    protected static function booted()
    {
        // 1. Logika saat SAVING (Auto Excerpt & Slug)
        static::saving(function ($news) {
            // Auto Slug jika title berubah atau baru
            if ($news->isDirty('news_title')) {
                $news->slug = Str::slug($news->news_title);
            }

            // Jika kolom short_description kosong, isi otomatis dari news_content
            if (empty($news->short_description)) {
                $news->short_description = Str::of(strip_tags($news->news_content))->limit(50);
            }
        });

        // 2. Logika saat DELETING (Hapus file fisik)
        static::deleting(function ($news) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
        });

        // 3. Logika saat UPDATING (Hapus file lama jika ganti foto baru)
        static::updating(function ($news) {
            if ($news->isDirty('image')) {
                $oldImage = $news->getOriginal('image');
                if ($oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });
    }
}
