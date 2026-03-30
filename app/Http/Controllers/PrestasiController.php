<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    // Halaman List Prestasi (Tampilan Grid/Banyak Data)
    public function index()
    {
        $prestasis = Prestasi::latest('tanggal_posting')
            ->paginate(12);

        return view('prestasi.index', compact('prestasis'));
    }

    // Halaman Detail Prestasi (Cari berdasarkan Slug)
    public function show($slug)
    {
        // Langsung cari datanya, kalau gak ada kasih error 404
        // 'photos' tetep dibawa karena lu pake galeri di Filament
        $prestasi = Prestasi::with(['photos'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('prestasi.detail', compact('prestasi'));
    }
}
