<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PengumumanSekolah; // Sesuaikan nama model
use Illuminate\Http\Request;

class PengumumanSekolahController extends Controller
{
    public function index(Request $request)
    {
        $kategoriAktif = $request->query('kategori');

        // Mengambil kategori yang punya pengumuman sekolah
        $categories = Category::query()
            ->withCount('pengumuman') // Sesuaikan nama relasi di Model Category
            ->orderBy('name_category')
            ->get();

        $query = PengumumanSekolah::with('category')
            ->orderBy('posted_at', 'desc');

        // Filter kategori jika ada di URL
        if ($kategoriAktif) {
            $query->whereHas('category', function ($q) use ($kategoriAktif) {
                $q->where('slug', $kategoriAktif);
            });
        }

        $announcements = $query->paginate(6)->withQueryString();

        return view('pengumuman.index', compact('announcements', 'categories', 'kategoriAktif'));
    }

    public function show(string $slug)
    {
        $item = PengumumanSekolah::with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pengumuman.detail', compact('item'));
    }
}
