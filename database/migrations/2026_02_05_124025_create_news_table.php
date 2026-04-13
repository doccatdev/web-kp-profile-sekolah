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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('news_title');
            $table->text('short_description')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('slug');
            $table->longText('news_content');
            $table->string('image')->nullable();
            $table->date('posted_at');
            $table->foreignId('author_id')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('status', ['draft', 'pending', 'published', 'rejected'])->default('pending');
            $table->text('rejection_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
