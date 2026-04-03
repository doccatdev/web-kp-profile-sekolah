<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
