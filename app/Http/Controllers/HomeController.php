<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Slider;
use App\Models\PpdbInfo;
use App\Models\Fasilitas;
use App\Models\ProgramUnggulan;
use App\Models\PengumumanSekolah;
use App\Models\Ekstrakulikuler;
use App\Models\Prestasi;
use App\Models\Guru; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $news = News::with('category')->orderBy('posted_at', 'desc')->take(3)->get();
        $announcements = PengumumanSekolah::orderBy('posted_at', 'desc')->take(3)->get();
        $ppdb = PpdbInfo::first();
        $fasilitas = Fasilitas::take(3)->get();
        $programUnggulan = ProgramUnggulan::latest()->take(3)->get();
        $ekstrakulikulers = Ekstrakulikuler::latest()->take(6)->get();
        $prestasis = Prestasi::latest()->take(3)->get();    
        $guru = Guru::orderBy('nama', 'asc')->take(4)->get(); 

        return view('welcome', compact(
            'sliders',
            'news',
            'announcements',
            'ppdb',
            'fasilitas',
            'programUnggulan',
            'ekstrakulikulers',
            'prestasis',
            'guru', // <--- 3. Masukkan ke compact
        ));
    }
}