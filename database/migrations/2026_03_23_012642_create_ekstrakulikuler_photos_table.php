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
        Schema::create('ekstrakulikuler_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ekstrakulikuler_id')->constrained('ekstrakulikuler')->onDelete('cascade');
            $table->string('foto');
            $table->string('caption')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekstrakulikuler_photos');
    }
};
