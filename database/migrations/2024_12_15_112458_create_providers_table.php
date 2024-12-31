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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('provider_name');
            $table->string('provider_alias');
            $table->string('provider_code')->nullable();
            $table->string('provider_type', 25)->nullable();
            $table->string('provider_image_desktop')->nullable();
            $table->string('provider_image_mobile')->nullable();
            $table->tinyInteger('provider_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
