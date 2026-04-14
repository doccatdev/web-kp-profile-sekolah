<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

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
        'author_id',
        'status',
        'rejection_reason',
    ];

    // ─── Scopes ───────────────────────────────────────────────────────────────

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // ─── Relationships ────────────────────────────────────────────────────────

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function approvedComments(): HasMany
    {
        return $this->hasMany(Comment::class)->approved();
    }

    // ─── Model Events ─────────────────────────────────────────────────────────

    protected static function booted(): void
    {
        static::saving(function (News $news) {
            // Auto slug
            if ($news->isDirty('news_title')) {
                $news->slug = Str::slug($news->news_title);
            }

            // Auto excerpt
            if (empty($news->short_description)) {
                $news->short_description = Str::of(strip_tags($news->news_content))->limit(50);
            }

            // Pastikan artikel baru dari frontend selalu pending
            if (! $news->exists && empty($news->status)) {
                $news->status = 'pending';
            }
        });

        // Hapus file gambar saat record dihapus
        static::deleting(function (News $news) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
        });

        // Hapus gambar lama saat ganti thumbnail baru
        static::updating(function (News $news) {
            if ($news->isDirty('image')) {
                $oldImage = $news->getOriginal('image');
                if ($oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });
    }
}