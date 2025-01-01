<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('promotion_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promotion_id');
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade');
            $table->string('detail_title'); // Title for promotion detail
            $table->text('detail_description'); // Description for promotion detail
            $table->decimal('detail_turnover', 15, 2)->nullable(); // Turnover for this detail
            $table->decimal('detail_total_turnover', 15, 2)->nullable(); // Total Turnover for this detail
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promotion_details');
    }
}
