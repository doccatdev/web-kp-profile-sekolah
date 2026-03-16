<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PpdbInfo;

class PpdbController extends Controller
{
    public function index()
    {
        // Menggunakan with('contacts') agar data admin ikut terambil
        $ppdb = PpdbInfo::with('contacts')
                        ->active() // Pastikan scopeActive() sudah ada di model
                        ->latest()
                        ->first();

        // Jika data tidak ada, kita bisa beri fallback agar view tidak error
        if (!$ppdb) {
            return view('ppdb.index')->with('ppdb', null);
        }

        return view('ppdb.index', compact('ppdb'));
    }
}