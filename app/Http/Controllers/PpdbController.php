<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PpdbInfo;

class PpdbController extends Controller
{
    //
    public function index()
    {
        // Mengambil data pertama
        $ppdb = PpdbInfo::active()->latest()->first();

        // Kirim dengan nama 'ppdb'
        return view('ppdb.index', compact('ppdb'));
    }
}
