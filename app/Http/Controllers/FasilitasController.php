<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Halaman Utama Sarana & Prasarana (Daftar Card)
     * File: resources/views/fasilitas.blade.php
     */
    public function index()
{
    $fasilitas = Fasilitas::all();
    // Panggil folder 'fasliltas' (sesuai gambar) baru nama file 'fasilitas'
    return view('fasilitas.fasilitas', compact('fasilitas'));
}

public function show($slug)
{
    $item = Fasilitas::with('galeri')->where('slug', $slug)->firstOrFail();
    // Panggil folder 'fasliltas' baru nama file 'detail'
    return view('fasilitas.detail', compact('item'));
}
}
