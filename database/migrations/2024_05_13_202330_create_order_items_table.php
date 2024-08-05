<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * الجدول الخاص بكل مستلزم من مستلزمات المناسبة
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
            ->constrained('orders')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('sub_room_id')
            ->constrained('sub_rooms')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('photography_team_id')
            ->constrained('photography_teams')
            ->cascadeOnDelete()
            ->cascadeOnUpdate()->nullable();

            $table->foreignId('invitation_card_id')
            ->constrained('invitation_cards')
            ->cascadeOnDelete()
            ->cascadeOnUpdate()->nullable();

            $table->unique('invitation_card_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
