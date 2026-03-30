<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('prestasi', function (Blueprint $table) {
            // Mengubah nama kolom dari tanggal_prestasi ke tanggal_posting
            $table->renameColumn('tanggal_prestasi', 'tanggal_posting');
        });
    }

    public function down(): void
    {
        Schema::table('prestasi', function (Blueprint $table) {
            // Balikin lagi kalau suatu saat di-rollback
            $table->renameColumn('tanggal_posting', 'tanggal_prestasi');
        });
    }
};