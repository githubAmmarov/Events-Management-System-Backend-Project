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
        Schema::create('food_order', function (Blueprint $table) {
            $table->id();

            $table->foreignId('food_id')
            ->constrained('food')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('order_id')
            ->constrained('orders')
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
        Schema::dropIfExists('food_order');
    }
};
