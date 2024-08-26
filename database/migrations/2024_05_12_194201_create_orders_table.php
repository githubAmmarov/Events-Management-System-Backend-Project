<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * جدول الطلب الكلي للمناسبة
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')
            ->constrained('events')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->unique('event_id');

            $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('sub_room_id')
            ->constrained('sub_rooms')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('photography_team_id')->nullable()
            ->constrained('photography_teams')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('invitation_card_id')
            ->constrained('invitation_cards')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->unique('invitation_card_id');

            $table->integer('total_cost');
            $table->boolean('is_paid')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
