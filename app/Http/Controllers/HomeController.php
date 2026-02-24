<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\FlagshipProgram;
use App\Models\Extracurricular;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::with('category')
            ->orderBy('posted_at', 'desc')
            ->take(3)
            ->get();


        return view('welcome', compact('news'));
    }
}
