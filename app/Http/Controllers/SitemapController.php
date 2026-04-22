<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\ProgramUnggulan;
use App\Models\Fasilitas;
use App\Models\Prestasi;
use App\Models\Ekstrakulikuler;
use App\Models\Guru;
use App\Models\PengumumanSekolah;

class SitemapController extends Controller
{
    public function index()
    {
        $data = [
            'news' => News::latest()->get(),
            'program' => ProgramUnggulan::all(),
            'fasilitas' => Fasilitas::all(),
            'prestasi' => Prestasi::all(),
            'ekskul' => Ekstrakulikuler::all(),
            'guru' => Guru::all(),
            'pengumuman' => PengumumanSekolah::latest()->get(),
        ];

        return response()->view('sitemap', $data)
                         ->header('Content-Type', 'text/xml');
    }
}