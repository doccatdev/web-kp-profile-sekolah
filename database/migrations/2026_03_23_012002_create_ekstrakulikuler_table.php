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
        Schema::create('ekstrakulikuler', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ekskul');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->string('icon_class')->nullable();
            $table->text('deskripsi_singkat');
            $table->longText('deskripsi_ekstrakulikuler');
            $table->string('pembina')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekstrakulikuler');
    }
};
