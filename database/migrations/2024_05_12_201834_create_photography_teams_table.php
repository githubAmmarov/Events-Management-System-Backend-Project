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
        Schema::create('photography_teams', function (Blueprint $table) {
            $table->id();

            $table->foreignId('media_id')
                ->constrained('media')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('name');
            $table->text('address');
            $table->float('cost');
            $table->integer('phone_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photography_teams');
    }
};
