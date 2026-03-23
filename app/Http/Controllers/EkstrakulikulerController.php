<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    public function index()
    {
        $extracurriculars = Ekstrakulikuler::latest()->get();
        return view('ekstrakulikuler.index', compact('extracurriculars'));
    }

    public function show($slug)
    {
        $ekskul = Ekstrakulikuler::with('photos')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('ekstrakulikuler.detail', compact('ekskul'));
    }
}
