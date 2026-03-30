<?php

namespace App\Http\Controllers;

use App\Models\PengumumanSekolah;
use Illuminate\Http\Request;

class PengumumanSekolahController extends Controller
{
    public function index()
    {
        // Ambil semua pengumuman, urutkan dari yang terbaru (posted_at)
        $announcements = PengumumanSekolah::orderBy('posted_at', 'desc')
            ->paginate(6);

        // Langsung kirim ke view, gak perlu lagi bawa variabel $categories
        return view('pengumuman.index', compact('announcements'));
    }

    public function show(string $slug)
    {
        // Cari pengumuman berdasarkan slug, tanpa relasi category
        $item = PengumumanSekolah::where('slug', $slug)
            ->firstOrFail();

        return view('pengumuman.detail', compact('item'));
    }
}