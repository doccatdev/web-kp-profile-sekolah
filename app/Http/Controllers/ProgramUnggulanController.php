<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramUnggulan;

class ProgramUnggulanController extends Controller
{
    // Halaman Daftar Program (Semua Card)
    public function index()
    {
        // Ambil data terbaru
        $programUnggulan = ProgramUnggulan::all();

        // Sesuaikan path ke folder 'program-unggulan'
        return view('program-unggulan.index', compact('programUnggulan'));
    }

    // Halaman Detail Program (Pake Slug)
    public function show($slug)
    {
        // Eager load 'galleries' sesuai relasi di Model
        $program = ProgramUnggulan::with('galleries')->where('slug', $slug)->firstOrFail();

        // Sesuaikan path ke folder 'program-unggulan'
        return view('program-unggulan.detail', compact('program'));
    }
}
