<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('download_logs')) {
            Schema::create('download_logs', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('foto_id')->constrained('fotos')->onDelete('cascade');
                $table->timestamp('downloaded_at');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('download_logs');
    }
};
