<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opening_hours', function (Blueprint $table) {
            $table->id();

            $table->foreignId('restaurant_setting_id')
                ->constrained('restaurant_settings')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->smallInteger('day_of_week');
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->boolean('is_closed')->default(false);
            $table->smallInteger('display_order');

            $table->timestamps();

            $table->unique(
                ['restaurant_setting_id', 'day_of_week'],
                'opening_hours_restaurant_day_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opening_hours');
    }
};