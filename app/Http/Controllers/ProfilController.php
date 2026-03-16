<?php

namespace App\Http\Controllers;

use App\Models\SekolahProfile; // Pastikan nama Model Anda benar (Profil)
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    // 1. Halaman Profil Sekolah
    public function profilSekolah()
    {
        $profil = SekolahProfile::first();
        // Mengambil foto jika ada relasi, jika tidak biarkan collect kosong
        $profilPhotos = $profil->photos ?? collect();

        return view('profil.profil-sekolah', compact('profil', 'profilPhotos'));
    }

    // 2. Halaman Sejarah
    public function sejarah()
    {
        $sejarah = SekolahProfile::first();
        return view('profil.sejarah', compact('sejarah'));
    }

    // 3. Halaman Visi Misi
    public function visiMisi()
    {
        $visiMisi = SekolahProfile::first();
        return view('profil.visi-misi', compact('visiMisi'));
    }
}
