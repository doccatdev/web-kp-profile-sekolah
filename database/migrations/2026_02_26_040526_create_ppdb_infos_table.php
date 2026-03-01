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
        Schema::create('ppdb_info', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Buka', 'Tutup'])->default('Tutup');
            $table->string('tahun_ajaran')->nullable();
            $table->text('rincian_biaya')->nullable();
            $table->text('persyaratan')->nullable();
            $table->string('gambar_brosur')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdb_infos');
    }
};
