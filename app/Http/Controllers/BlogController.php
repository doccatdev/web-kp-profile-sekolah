<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $kategoriAktif = $request->query('kategori');

        $categories = Category::query()
            ->withCount('news')
            ->orderBy('name_category')
            ->get();

        $query = News::with('category')
            ->orderBy('posted_at', 'desc');

        if ($kategoriAktif) {
            $query->whereHas('category', function ($q) use ($kategoriAktif) {
                $q->where('slug', $kategoriAktif);
            });
        }

        // Paginator (bukan Collection) agar bisa hasPages() dan links()
        $news = $query->paginate(4)->withQueryString();

        return view('berita.berita', compact('news', 'categories', 'kategoriAktif'));
    }

    public function show($slug)
    {
        $item = News::where('slug', $slug)->firstOrFail();

        // Ambil komentar approved untuk berita ini
        $comments = \App\Models\Comment::where('news_id', $item->id)
            ->where('is_approved', true)
            ->whereNull('parent_id') // Fokus ke komentar utama saja dulu
            ->latest()
            ->get();

        $beritaLainnya = News::where('id', '!=', $item->id)->latest()->take(4)->get();

        return view('berita.detail', compact('item', 'beritaLainnya', 'comments'));
    }
}
