<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PpdbController;
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

// Beranda (menggunakan HomeController untuk data dinamis)
Route::get('/', [HomeController::class, 'index']);

// Program Unggulan
Route::get('/program-unggulan', function () {
    return view('program-unggulan.index');
})->name('program-unggulan.index');

Route::get('/program-unggulan/{id}', function ($id) {
    return view('program-unggulan.detail', compact('id'));
})->name('program-unggulan.detail');


// Sarana & Prasarana
Route::get('/fasilitas', function () {
    return view('fasliltas.fasilitas');
})->name('fasilitas.index');

Route::get('/fasilitas/{id}', function ($id) {
    // Generate a formatted title based on ID
    $title = ucwords(str_replace('-', ' ', $id));
    return view('fasliltas.detail', compact('id', 'title'));
})->name('fasilitas.detail');

// Prestasi
Route::get('/prestasi', function () {
    return view('prestasi.index');
})->name('prestasi.index');

Route::get('/prestasi/{id}', function ($id) {
    return view('prestasi.detail', compact('id'));
})->name('prestasi.detail');

// Ekstrakulikuler
Route::get('/ekstrakulikuler', function () {
    return view('ekstrakulikuler.index');
})->name('ekstrakulikuler.index');

Route::get('/ekstrakulikuler/{id}', function ($id) {
    return view('ekstrakulikuler.detail', compact('id'));
})->name('ekstrakulikuler.detail');

Route::get('/profil/profil-sekolah', function () {
    return view('profil.profil-sekolah', ['profil' => null, 'profilPhotos' => collect()]);
});
Route::get('/profil/sejarah', function () {
    return view('profil.sejarah', ['sejarah' => null]);
});
Route::get('/profil/visi-misi', function () {
    return view('profil.visi-misi', ['visiMisi' => null]);
});
Route::get('/profil/data-guru', function () {
    return view('pengajar.data-guru');
})->name('profil.data-guru');

Route::get('/profil/data-guru/{id}', function ($id) {
    return view('pengajar.detail', compact('id'));
})->name('profil.data-guru.detail');


// Informasi: Berita
Route::get('/berita', [BlogController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BlogController::class, 'show'])->name('berita.show');

// Informasi: Pengumuman
Route::get('/pengumuman', function () {
    return view('pengumuman.index');
})->name('pengumuman.index');

Route::get('/pengumuman/{id}', function ($id) {
    return view('pengumuman.detail', compact('id'));
})->name('pengumuman.detail');

// PPDB
Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb.index');

// Kontak
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak.index');
