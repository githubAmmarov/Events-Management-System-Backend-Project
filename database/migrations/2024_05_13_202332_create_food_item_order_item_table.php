<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * PIVOT TABLE
     */
    public function up(): void
    {
        Schema::create('food_item_order_item', function (Blueprint $table) {
            $table->id();

            $table->foreignId('food_item_id')
            ->constrained('food_items')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('order_item_id')
            ->constrained('order_items')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_item_order_item');
    }
};
