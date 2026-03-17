<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\FlagshipProgram;
use App\Models\PpdbInfo;
use App\Models\Fasilitas; // 1. WAJIB IMPORT MODEL INI
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 3 berita terbaru
        $news = News::with('category')
            ->orderBy('posted_at', 'desc')
            ->take(3)
            ->get();

        // Ambil data PPDB yang statusnya 'Buka'
        $ppdb = PpdbInfo::where('status', 'Buka')->first();

        // 2. AMBIL DATA FASILITAS (Cuma ambil 3 buat pajangan di Beranda)
        $fasilitas = Fasilitas::take(3)->get();

        // 3. KIRIM SEMUANYA KE VIEW (Tambahin 'fasilitas' di compact)
        return view('welcome', compact('news', 'ppdb', 'fasilitas'));
    }
}