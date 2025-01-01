<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title Promotion
            $table->text('description'); // Description Promotion
            $table->boolean('is_active')->default(true); // Apakah promotion bisa diambil atau tidak
            $table->decimal('turnover', 15, 2)->nullable(); // Turnover/Winover
            $table->decimal('total_turnover', 15, 2)->nullable(); // Total Turnover/Total Winover
            $table->decimal('minimum_deposit', 15, 2)->nullable(); // Minimum Deposit
            $table->decimal('maximum_deposit', 15, 2)->nullable(); // Maximum Deposit
            $table->decimal('minimum_withdraw', 15, 2)->nullable(); // Minimum Withdraw
            $table->decimal('maximum_withdraw', 15, 2)->nullable(); // Maximum Withdraw
            $table->enum('claim_type', ['manual', 'auto'])->default('manual'); // Manual Claim / Automatic Claim on Deposit
            $table->boolean('status')->default(true); // Status
            $table->date('start_date'); // Tanggal Mulai
            $table->date('end_date'); // Tanggal Berakhir
            $table->enum('promotion_type', ['posting', 'bonus', 'new_member', 'others'])->default('others'); // Tipe promotion
            $table->string('banner')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
