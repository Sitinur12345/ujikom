<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropLikesDislikesTables extends Migration
{
    public function up()
    {
        // Hanya hapus dislikes table, keep likes table
        if (Schema::hasTable('dislikes')) {
            Schema::table('dislikes', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropForeign(['post_id']);
            });
            Schema::dropIfExists('dislikes');
        }
    }

    public function down()
    {
        // Jika perlu rollback, buat ulang tabel dislikes
        Schema::create('dislikes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }
}
