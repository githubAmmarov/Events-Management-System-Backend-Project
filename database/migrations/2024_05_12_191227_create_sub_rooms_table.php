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
        Schema::create('sub_rooms', function (Blueprint $table) {
            $table->id();

            $table->foreignId('place_id')
            ->constrained('places')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('place_room_type_id')
            ->constrained('place_room_types')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('media_id')->nullable()
                ->constrained('media')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

                $table->unique('media_id');

            $table->integer('capacity');
            $table->string('name');
            $table->float('cost');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_rooms');
    }
};
