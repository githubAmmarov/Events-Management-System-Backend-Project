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
        Schema::create('food', function (Blueprint $table) {
            $table->id();

            $table->foreignId('media_id')
            ->constrained('media')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->unique('media_id');

            $table->foreignId('food_category_id')
            ->constrained('food_categories')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->string('name');
            $table->float('price');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
