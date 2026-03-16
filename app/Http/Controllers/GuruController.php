<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        // Mengambil semua data guru dari tabel 'teachers'
        $guru = Guru::orderBy('nama', 'asc')->get();

        // Diarahkan ke resources/views/pengajar/data-guru.blade.php
        return view('pengajar.data-guru', compact('guru'));
    }

    public function detail($slug)
    {
        // Mencari data berdasarkan slug, jika tidak ada tampilkan 404
        $data = Guru::where('slug', $slug)->firstOrFail();

        // Diarahkan ke resources/views/pengajar/detail.blade.php
        return view('pengajar.detail', [
            'data' => $data,
            'title' => $data->nama
        ]);
    }
}
