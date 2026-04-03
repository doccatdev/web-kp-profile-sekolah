<?php

namespace App\Http\Controllers;

use App\Models\Comment; // Pastikan import Model
use App\Models\Blog; // Pastikan import Model
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function Store(StoreCommentRequest $request)
    {
        Comment::create([
            'news_id' => $request->news_id,
            'user_id' => auth()->id(),
            'guest_name' => auth()->check() ? null :$request->guest_name,
            'guest_mail' => auth()->check() ? null :$request->guest_mail,
            'parent_id' => $request->parent_id,
            'body' => $request->body
        ]);

        return back()->with('success', 'Komentar Anda berhasil terkirim!');
    }
}
