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
        Schema::create('invitation_cards', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')
                ->constrained('events')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

                $table->unique('event_id');

                $table->foreignId('invitation_card_style_id')
                ->constrained('invitation_card_styles')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_cards');
    }
};
