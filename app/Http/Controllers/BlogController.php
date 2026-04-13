<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $kategoriAktif = $request->query('kategori');

        $categories = Category::query()
            ->withCount(['news' => function ($q) {
                $q->where('status', 'published'); // only count published articles
            }])
            ->orderBy('name_category')
            ->get();

        $query = News::with('category')
            ->published()                          // only show published articles
            ->orderBy('posted_at', 'desc');

        if ($kategoriAktif) {
            $query->whereHas('category', function ($q) use ($kategoriAktif) {
                $q->where('slug', $kategoriAktif);
            });
        }

        $news = $query->paginate(4)->withQueryString();

        $news->load(['comments' => function ($query) {
            return $query->where('parent_id', null)->approved()->with('replies');
        }]);

        return view('berita.berita', compact('news', 'categories', 'kategoriAktif'));
    }

    public function show($slug)
    {
        // Only allow viewing published articles on the frontend
        $item = News::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $comments = Comment::where('news_id', $item->id)
            ->where('is_approved', true)
            ->whereNull('parent_id')
            ->latest()
            ->get();

        // Also only show published articles in the sidebar
        $beritaLainnya = News::published()
            ->where('id', '!=', $item->id)
            ->latest()
            ->take(4)
            ->get();

        return view('berita.detail', compact('item', 'beritaLainnya', 'comments'));
    }
}