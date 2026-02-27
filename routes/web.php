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

// // Profil
// Route::get('/profil/profil-sekolah', function () {
//     $profilPhotos = ProfilPhoto::active()->ordered()->get();
//     return view('profil.profil-sekolah', ['profil' => null, 'profilPhotos' => $profilPhotos]);
// });
Route::get('/profil/sejarah', function () {
    return view('profil.sejarah', ['sejarah' => null]);
});
Route::get('/profil/visi-misi', function () {
    return view('profil.visi-misi', ['visiMisi' => null]);
});
Route::get('/profil/data-guru', function () {
    return view('profil.data-guru');
});

// // Program Unggulan
// Route::get('/program-unggulan', function () {
//     $flagshipPrograms = App\Models\FlagshipProgram::orderBy('order')->get();
//     return view('program-unggulan.index', compact('flagshipPrograms'));
// })->name('program-unggulan.index');

// Route::get('/program-unggulan/{id}', function ($id) {
//     $program = App\Models\FlagshipProgram::findOrFail($id);
//     return view('program-unggulan.detail', compact('program'));
// })->name('program-unggulan.show');

// // Ekstrakulikuler (halaman dedicated)
// Route::get('/ekstrakulikuler', function () {
//     return view('ekstrakulikuler.index', compact('extracurriculars'));
// });

// Informasi: Berita
Route::get('/berita', [BlogController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BlogController::class, 'show'])->name('berita.show');

// Informasi: Pengumuman
Route::get('/pengumuman', function () {
    return view('pengumuman.index');
})->name('pengumuman.index');

// PPDB
Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb.index');
// Prestasi
Route::get('/prestasi', function () {
    return view('prestasi.index');
})->name('prestasi.index');

// Kontak
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak.index');
