<?php

namespace App\Http\Controllers;

use App\Models\Comment; // Pastikan import Model
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function Store(StoreCommentRequest $request)
{
    try {
        // Mengambil data yang sudah lolos validasi
        $validated = $request->validated();

        // Tambahkan logika untuk user login vs guest secara manual
        $data = [
            'news_id'     => $validated['news_id'],
            'parent_id'   => $validated['parent_id'],
            'body'        => $validated['body'],
            'user_id'     => auth()->id(),
            'is_approved' => false, // Default menunggu moderasi
        ];

        if (auth()->check()) {
            $data['guest_name'] = auth()->user()->name;
            $data['guest_mail'] = auth()->user()->email;
        } else {
            $data['guest_name'] = $validated['guest_name'];
            $data['guest_mail'] = $validated['guest_mail'];
        }

        Comment::create([
            'news_id' => $request->news_id,
            'name' => $request->name,
            'email' => $request->email,
            'comment_content' => $request->comment_content,
            'status' => 'pending', // Opsional: Beri status agar bisa dimoderasi admin
        ]);

        return back()->with('success', 'Komentar Anda berhasil terkirim!');
    } catch (\Exception $e) {
        // Debugging: hapus $e->getMessage() jika sudah live
        return back()->with('error', 'Gagal: ' . $e->getMessage())->withInput();
    }
}
}
