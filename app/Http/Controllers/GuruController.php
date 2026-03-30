<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::orderBy('nama', 'asc')->get();
        // Pastikan ini 'pengajar.data-guru' sesuai folder lu di gambar
        return view('pengajar.data-guru', compact('guru'));
    }

    public function detail($slug)
    {
        $data = Guru::where('slug', $slug)->firstOrFail();
        // Pastikan ini 'pengajar.detail'
        return view('pengajar.detail', [
            'data' => $data,
            'title' => $data->nama
        ]);
    }
}
