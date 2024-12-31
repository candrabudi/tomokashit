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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('payment_account_id');
            $table->bigInteger('bonus_id')->default(0);
            $table->bigInteger('nominal');
            $table->enum('type', ['deposit', 'withdraw', 'bonus', 'manual_deposit', 'manual_withdraw']);
            $table->enum('status', ['pending', 'progress', 'approved', 'rejected'])->default('pending');
            $table->string('notes')->nullable();
            $table->string('reason')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->string('updated_ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
