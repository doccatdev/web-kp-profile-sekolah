<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PenulisController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', function ($request, $next) {
            if (!auth()->user()->hasRole('teacher')) {
                abort(403, 'Akses ditolak. Anda bukan guru.');
            }
            return $next($request);
        }]);
    }

    public function create()
    {
        $categories = Category::orderBy('name_category')->get();
        return view('berita.tulis', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'news_title'   => 'required|string|max:255',
            'category_id'  => 'required|exists:categories,id',
            'news_content' => 'required|string|min:50', // Minimal 50 karakter
            'image'        => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], $this->messages());

        $validated['author_id'] = auth()->id();
        $validated['status']    = 'pending';
        $validated['posted_at'] = now();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('berita', 'public');
        }

        News::create($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Artikel berhasil dikirim. Menunggu persetujuan admin.');
    }

    public function edit(News $news)
    {
        abort_unless($news->author_id === auth()->id(), 403);
        abort_if($news->status === 'published', 403, 'Artikel yang sudah terbit tidak bisa diedit via front-end.');

        $categories = Category::orderBy('name_category')->get();
        return view('berita.tulis', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        abort_unless($news->author_id === auth()->id(), 403);

        $validated = $request->validate([
            'news_title'   => 'required|string|max:255',
            'category_id'  => 'required|exists:categories,id',
            'news_content' => 'required|string|min:50', // FIXED: Dulu max:255 (ini biang kerok error-nya)
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], $this->messages());

        $validated['status'] = 'pending'; 

        if ($request->hasFile('image')) {
            if ($news->image) Storage::disk('public')->delete($news->image);
            $validated['image'] = $request->file('image')->store('berita', 'public');
        }

        $news->update($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Perubahan disimpan. Menunggu moderasi ulang.');
    }

    /**
     * Pesan Error Bahasa Indonesia
     */
    private function messages()
    {
        return [
            'news_title.required'   => 'Judul berita wajib diisi.',
            'category_id.required'  => 'Mohon isi kategori berita.',
            'news_content.required' => 'Mohon masukan isi berita.',
            'news_content.min'      => 'Isi berita minimal 50 karakter.',
            'image.required'        => 'Mohon masukan thumbnail berita.',
            'image.image'           => 'File harus berupa gambar.',
            'image.mimes'           => 'Format gambar cuma boleh: JPG, JPEG, PNG, atau WEBP.',
            'image.max'             => 'Maksimal ukuran gambar 2MB.',
        ];
    }
}