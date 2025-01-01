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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();

            // Agent Settings
            $table->string('agent_code')->nullable()->comment('Code for agent integration');
            $table->string('agent_token')->nullable()->comment('Token for agent authentication');
            $table->string('agent_signature')->nullable()->comment('Signature for agent security');

            // Website Settings
            $table->boolean('site_maintenance')->default(false)->comment('Is the site in maintenance mode?');
            $table->string('site_title')->nullable()->comment('Website title');
            $table->text('site_description')->nullable()->comment('Brief description of the website');
            $table->string('site_favicon')->nullable()->comment('URL for the website favicon');
            $table->string('site_logo')->nullable()->comment('URL for the website logo');

            // Additional Settings (Contact and Social Media)
            $table->string('contact_email')->nullable()->comment('Primary contact email');
            $table->string('contact_phone')->nullable()->comment('Primary contact phone number');
            $table->string('address')->nullable()->comment('Business address');
            
            // Social Media URLs
            $table->string('social_facebook')->nullable()->comment('Facebook page URL');
            $table->string('social_twitter')->nullable()->comment('Twitter profile URL');
            $table->string('social_instagram')->nullable()->comment('Instagram profile URL');
            $table->string('social_linkedin')->nullable()->comment('LinkedIn profile URL');
            $table->string('social_telegram')->nullable()->comment('Telegram profile URL'); // New: Telegram URL

            // SEO Settings
            $table->string('meta_keywords')->nullable()->comment('SEO keywords for the website');
            $table->string('meta_author')->nullable()->comment('Website author for SEO');

            // Live Chat Settings
            $table->string('live_chat_link')->nullable()->comment('Link to live chat support'); // New: Live chat link
            $table->text('live_chat_script')->nullable()->comment('Live chat integration script'); // New: Live chat script

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
