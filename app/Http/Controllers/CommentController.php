<?php

namespace App\Http\Controllers;

use App\Models\Comment; // Pastikan import Model
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'news_id' => 'required|exists:news,id',
            'guest_name' => 'required|string|max:255',
            'guest_mail' => 'required|email|max:255',
            'body' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        // PASTIKAN PROSES SIMPAN SEPERTI INI:
        Comment::create([
            'news_id' => $validated['news_id'],
            'guest_name' => $validated['guest_name'], // Mengambil dari input form
            'guest_mail' => $validated['guest_mail'], // Mengambil dari input form
            'body' => $validated['body'],
            'parent_id' => $validated['parent_id'],
            'is_active' => false, // Menunggu moderasi sesuai info di form
        ]);

        return back()->with('success', 'Komentar Anda berhasil terkirim.');
    }
}
