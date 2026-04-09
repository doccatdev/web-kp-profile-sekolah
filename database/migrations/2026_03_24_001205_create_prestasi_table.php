<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();


            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('tingkat'); // Contoh: Nasional, Provinsi
            $table->string('kategori_prestasi'); // Akademik, Non-Akademik, Ekstrakulikuler
            $table->string('thumbnail');
            $table->text('deskripsi_singkat');
            $table->longText('konten');
            $table->date('tanggal_posting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
