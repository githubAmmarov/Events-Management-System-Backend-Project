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
        Schema::create('invitation_card_styles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('media_id')
                ->constrained('media')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            
            $table->string('style');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_card_styles');
    }
};
