<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ProgramUnggulanController;
use App\Http\Controllers\GuruController;
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

// Route Program Unggulan
Route::prefix('program-unggulan')->group(function () {
    // Halaman List: smp-alhusainiyyah.sch.id/program-unggulan
    Route::get('/', [ProgramUnggulanController::class, 'index'])->name('program-unggulan.index');

    // Halaman Detail: smp-alhusainiyyah.sch.id/program-unggulan/nama-slug
    Route::get('/{slug}', [ProgramUnggulanController::class, 'show'])->name('program-unggulan.detail');
});


// Sarana & Prasarana
Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');

Route::get('/fasilitas/{slug}', [FasilitasController::class, 'show'])->name('fasilitas.detail');

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

Route::get('/profil/profil-sekolah', [ProfilController::class, 'profilSekolah']);
Route::get('/profil/sejarah', [ProfilController::class, 'sejarah']);
Route::get('/profil/visi-misi', [ProfilController::class, 'visiMisi']);

// Menampilkan daftar semua guru
Route::get('/profil/data-guru', [GuruController::class, 'index'])->name('profil.data-guru');

// Menampilkan detail guru berdasarkan SLUG (lebih SEO friendly daripada ID)
Route::get('/profil/data-guru/{slug}', [GuruController::class, 'detail'])->name('profil.data-guru.detail');


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
