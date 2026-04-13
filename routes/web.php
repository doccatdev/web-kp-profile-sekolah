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
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PenulisController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// ─── AUTH ─────────────────────────────────────────────────────────────────────

// Named 'login' alias — redirects guests to Filament login page
Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');

// Frontend logout — clears both web + filament sessions then goes home
Route::post('/logout', function () {
    Auth::guard('web')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->middleware('web')->name('logout');

// ─── BERANDA ──────────────────────────────────────────────────────────────────

Route::get('/', [HomeController::class, 'index']);

// ─── PROGRAM UNGGULAN ─────────────────────────────────────────────────────────

Route::prefix('program-unggulan')->group(function () {
    Route::get('/', [ProgramUnggulanController::class, 'index'])->name('program-unggulan.index');
    Route::get('/{slug}', [ProgramUnggulanController::class, 'show'])->name('program-unggulan.detail');
});

// ─── FASILITAS ────────────────────────────────────────────────────────────────

Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
Route::get('/fasilitas/{slug}', [FasilitasController::class, 'show'])->name('fasilitas.detail');

// ─── PRESTASI ─────────────────────────────────────────────────────────────────

Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
Route::get('/prestasi/{slug}', [PrestasiController::class, 'show'])->name('prestasi.show');

// ─── EKSTRAKULIKULER ──────────────────────────────────────────────────────────

Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('ekstrakulikuler.index');
Route::get('/ekstrakulikuler/{slug}', [EkstrakulikulerController::class, 'show'])->name('ekstrakulikuler.detail');

// ─── PROFIL ───────────────────────────────────────────────────────────────────

Route::prefix('profil')->group(function () {
    Route::get('/profil-sekolah', [ProfilController::class, 'profilSekolah']);
    Route::get('/sejarah', [ProfilController::class, 'sejarah']);
    Route::get('/visi-misi', [ProfilController::class, 'visiMisi']);
    Route::get('/data-guru', [GuruController::class, 'index'])->name('profil.data-guru.index');
    Route::get('/data-guru/{slug}', [GuruController::class, 'detail'])->name('profil.data-guru.detail');
});

// ─── BERITA ───────────────────────────────────────────────────────────────────

Route::get('/berita', [BlogController::class, 'index'])->name('berita.index');

// Auth routes for teacher — must come BEFORE the wildcard /{slug}
Route::middleware(['auth'])->group(function () {
    Route::get('/berita/tulis', [PenulisController::class, 'create'])->name('berita.create');
    Route::post('/berita/tulis', [PenulisController::class, 'store'])->name('berita.store');
    Route::get('/berita/tulis/{news}/edit', [PenulisController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/tulis/{news}', [PenulisController::class, 'update'])->name('berita.update');
});

// Wildcard — must stay BELOW /tulis
Route::get('/berita/{slug}', [BlogController::class, 'show'])->name('berita.show');

// ─── KOMENTAR ─────────────────────────────────────────────────────────────────

Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');

// ─── PENGUMUMAN ───────────────────────────────────────────────────────────────

Route::get('/pengumuman', [PengumumanSekolahController::class, 'index'])->name('pengumuman.index');
Route::get('/pengumuman/{slug}', [PengumumanSekolahController::class, 'show'])->name('pengumuman.show');

// ─── PPDB & KONTAK ────────────────────────────────────────────────────────────

Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb.index');
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [ContactController::class, 'send'])->name('contact.send');