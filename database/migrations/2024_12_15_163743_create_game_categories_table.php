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
        Schema::create('game_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_code'); // 'id' dari JSON seperti 'igsgp-buy-feature'
            $table->string('translation_key'); // 'translationKey' seperti 'Buy Spins'
            $table->tinyInteger('status')->default(0); // Status (0: Nonaktif, 1: Aktif)
            $table->integer('game_count')->default(0); // Jumlah game yang terkait dengan kategori
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_categories');
    }
};
