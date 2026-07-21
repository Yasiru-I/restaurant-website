<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();

            $table->foreignId('restaurant_setting_id')
                ->constrained('restaurant_settings')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('platform', 50);
            $table->string('display_name', 100)->nullable();
            $table->string('url', 1000);

            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique(
                ['restaurant_setting_id', 'platform'],
                'social_links_restaurant_platform_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_links');
    }
};