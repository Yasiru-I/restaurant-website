<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('restaurant_settings', function (Blueprint $table) {
            $table->id();

            $table->string('restaurant_name', 150);
            $table->string('tagline', 255)->nullable();

            $table->string('short_description', 500)->nullable();
            $table->text('about_description')->nullable();

            $table->string('logo_path', 500)->nullable();
            $table->string('hero_image_path', 500)->nullable();

            $table->string('address_line_1', 255);
            $table->string('address_line_2', 255)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('country', 100)->nullable();

            $table->string('phone_number', 30);
            $table->string('secondary_phone_number', 30)->nullable();
            $table->string('email', 255)->nullable();

            $table->string('map_url', 1000)->nullable();
            $table->string('map_embed_url', 1000)->nullable();

            $table->string('currency_code', 3)->default('LKR');
            $table->string('currency_symbol', 10)->default('Rs.');

            $table->string('estimate_disclaimer', 500)
                ->default(
                    'This list is for price estimation only. It does not place an order.'
                );

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('restaurant_settings');
    }
};