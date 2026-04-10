<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_id',      // Sesuaikan dengan tabel (tadi Anda tulis post_id)
        'user_id',
        'parent_id',
        'guest_name',
        'guest_mail',   // Sesuaikan dengan tabel (tadi Anda tulis guest_email)
        'body',
        'is_approved'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi untuk mengambil balasan dari komentar ini
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('replies');
    }

    public function news() :BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('is_approved', true);
    }

    public function parent():BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
