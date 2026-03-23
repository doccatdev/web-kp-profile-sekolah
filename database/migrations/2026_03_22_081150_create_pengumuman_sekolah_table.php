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
        Schema::create('pengumuman_sekolah', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('judul_pengumuman');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->text('deskripsi_singkat');
            $table->longText('isi_pengumuman');
            $table->date('posted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumuman_sekolah');
    }
};
