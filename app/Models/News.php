<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // Memberitahu Laravel kolom ini adalah Tanggal
    protected $casts = [
        'posted_at' => 'date',
    ];

    protected $fillable = [
        'news_title',
        'category_id',
        'slug',
        'news_content',
        'excerpt',
        'image',
        'posted_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($news) {
            // Jika kolom excerpt kosong, isi otomatis dari news_content
            if (empty($news->excerpt)) {
                $news->excerpt = str(strip_tags($news->news_content))->limit(50);
            }
        });
    }
}
