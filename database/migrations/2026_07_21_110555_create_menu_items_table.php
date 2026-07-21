<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained()
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->string('name', 150);
            $table->string('slug', 180)->unique();

            $table->string('short_description', 300)->nullable();
            $table->text('description')->nullable();

            $table->decimal('price', 10, 2);
            $table->string('image_path', 500)->nullable();

            $table->boolean('is_available')->default(true);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);

            $table->boolean('is_vegetarian')->default(false);
            $table->boolean('is_spicy')->default(false);
            $table->smallInteger('spice_level')->nullable();

            $table->integer('display_order')->default(0);

            $table->timestamps();

            $table->index(
                ['category_id', 'is_active', 'display_order'],
                'menu_items_public_listing_idx'
            );

            $table->index(
                ['is_featured', 'is_active'],
                'menu_items_featured_idx'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};