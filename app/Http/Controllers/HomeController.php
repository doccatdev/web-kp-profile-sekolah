<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\FlagshipProgram;
use App\Models\PpdbInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::with('category')
            ->orderBy('posted_at', 'desc')
            ->take(3)
            ->get();

        // Ambil data PPDB yang statusnya 'Buka'
        // Gunakan nama variabel $ppdb agar sesuai dengan @if($ppdb) di Blade
        $ppdb = PpdbInfo::where('status', 'Buka')->first();

        // Kirimkan variabel $ppdb ke view
        return view('welcome', compact('news', 'ppdb'));
    }
}
