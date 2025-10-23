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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul halaman
            $table->string('slug')->unique(); // URL slug (about-us, contact, dll)
            $table->text('content'); // Isi halaman (HTML)
            $table->text('excerpt')->nullable(); // Ringkasan halaman
            $table->string('status')->default('published'); // published, draft
            $table->string('template')->default('default'); // Template yang digunakan
            $table->json('meta_data')->nullable(); // SEO meta data
            $table->integer('sort_order')->default(0); // Urutan di menu
            $table->timestamps();
            
            $table->index('slug');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
