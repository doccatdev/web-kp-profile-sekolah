<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\PpdbInfo;
use App\Models\Fasilitas;
use App\Models\ProgramUnggulan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil 3 berita terbaru
        $news = News::with('category')
            ->orderBy('posted_at', 'desc')
            ->take(3)
            ->get();

        // 2. Ambil data PPDB
        $ppdb = PpdbInfo::where('status', 'Buka')->first();

        // 3. Ambil 3 Fasilitas
        $fasilitas = Fasilitas::take(3)->get();

        // 4. AMBIL DATA PROGRAM UNGGULAN
        // ambil 3 data terbaru
        $programUnggulan = ProgramUnggulan::latest()->take(3)->get();

        // 5. KIRIM SEMUANYA
        return view('welcome', compact('news', 'ppdb', 'fasilitas', 'programUnggulan'));
    }
}
