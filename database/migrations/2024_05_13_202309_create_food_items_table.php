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
        Schema::create('food_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('media_id')
            ->constrained('media')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            
            $table->foreignId('food_id')
            ->constrained('food')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            
            $table->foreignId('food_shop_id')
            ->constrained('food_shops')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->float('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_items');
    }
};
