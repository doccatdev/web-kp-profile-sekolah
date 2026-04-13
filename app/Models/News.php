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
    ];

    // ─── Scopes ──────────────────────────────────────────────

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // ─── Relationships ────────────────────────────────────────

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

    // ─── Model Events ─────────────────────────────────────────

    protected static function booted(): void
    {
        // Auto-generate slug and excerpt on save
        static::saving(function (News $news) {
            if ($news->isDirty('news_title')) {
                $news->slug = Str::slug($news->news_title);
            }

            if (empty($news->short_description)) {
                $news->short_description = Str::of(strip_tags($news->news_content))->limit(50);
            }

            // Always set status to pending when created from frontend
            if (! $news->exists && empty($news->status)) {
                $news->status = 'pending';
            }
        });

        // Delete physical image file when record is deleted
        static::deleting(function (News $news) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
        });

        // Delete old image file when a new one is uploaded
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