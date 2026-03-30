<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ProgramUnggulanController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PengumumanSekolahController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\PrestasiController;
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
// Route Halaman List Prestasi
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');

// Route Halaman Detail Prestasi (Menggunakan Slug)
Route::get('/prestasi/{slug}', [PrestasiController::class, 'show'])->name('prestasi.show');

//Ekstrakulikuler
// Halaman Daftar Semua Ekskul


Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('ekstrakulikuler.index');

// Halaman Detail Ekskul (Menggunakan Slug agar lebih SEO Friendly)
Route::get('/ekstrakulikuler/{slug}', [EkstrakulikulerController::class, 'show'])->name('ekstrakulikuler.detail');

Route::get('/profil/profil-sekolah', [ProfilController::class, 'profilSekolah']);
Route::get('/profil/sejarah', [ProfilController::class, 'sejarah']);
Route::get('/profil/visi-misi', [ProfilController::class, 'visiMisi']);

// Menampilkan daftar semua guru
Route::get('/profil/data-guru', [GuruController::class, 'index'])->name('profil.data-guru.index');

// Menampilkan detail guru berdasarkan SLUG (lebih SEO friendly daripada ID)
Route::get('/profil/data-guru/{slug}', [GuruController::class, 'detail'])->name('profil.data-guru.detail');


// Informasi: Berita
Route::get('/berita', [BlogController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BlogController::class, 'show'])->name('berita.show');

// Informasi: Pengumuman

// Halaman Daftar Pengumuman (Card View)
Route::get('/pengumuman', [PengumumanSekolahController::class, 'index'])->name('pengumuman.index');

// Halaman Detail Pengumuman (Detail View)
Route::get('/pengumuman/{slug}', [PengumumanSekolahController::class, 'show'])->name('pengumuman.show');

// PPDB
Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb.index');

// Kontak
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [ContactController::class, 'send'])->name('contact.send');
