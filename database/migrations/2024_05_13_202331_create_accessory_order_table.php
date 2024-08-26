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
        Schema::create('accessory_order', function (Blueprint $table) {
            $table->id();

            
            $table->foreignId('accessory_id')
            ->constrained('accessories')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('order_id')
            ->constrained('orders')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessory_order');
    }
};
