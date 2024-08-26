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
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('event_type_id')
            ->constrained('event_types')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('sub_room_id')
            ->constrained('sub_rooms')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->longText('description');
            $table->time('event_time');
            $table->integer('num_of_guests');
            $table->integer('ticket_price')->nullable();
            $table->string('contact_information');
            $table->boolean('is_private');
            $table->boolean('planned')->default(false);
            $table->integer('planner_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
