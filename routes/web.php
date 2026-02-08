<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Models\News;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $news = News::orderBy('posted_at', 'desc')->take(3)->get();
    return view('welcome', compact('news'));
});

// Profil (siap untuk data dari Filament CRUD)
Route::get('/profil/sambutan', function () {
    return view('profil.sambutan', ['sambutan' => null]); // nanti: Sambutan::first()
});
Route::get('/profil/profil-sekolah', function () {
    return view('profil.profil-sekolah', ['profil' => null]);
});
Route::get('/profil/sejarah', function () {
    return view('profil.sejarah', ['sejarah' => null]);
});
Route::get('/profil/visi-misi', function () {
    return view('profil.visi-misi', ['visiMisi' => null]);
});

// Berita
Route::get('/berita', [BlogController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BlogController::class, 'show'])->name('berita.show');

// Galeri: Foto Kegiatan & Ekstrakulikuler (siap untuk data dari Filament CRUD)
Route::get('/galeri', function () {
    return view('galeri.galeri', ['fotos' => []]); // nanti: FotoKegiatan::orderBy('tanggal', 'desc')->get()
});
Route::get('/galeri/ekstrakulikuler', function () {
    return view('galeri.ekstrakulikuler', ['ekstrakulikuler' => []]); // nanti: Ekstrakulikuler::orderBy('nama')->get()
});

// Video (siap untuk data dari Filament CRUD)
Route::get('/video', function () {
    return view('video.video', ['videos' => []]); // nanti: Video::all()
});

// Kontak (siap untuk data dari Filament CRUD + pinpoint GMAPS)
Route::get('/kontak', function () {
    return view('kontak.kontak', ['kontak' => null]); // nanti: Kontak::first() atau Kontak::get()->first()
});
