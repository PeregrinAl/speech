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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('exercise_id');

            $table->foreign('exercise_id')
            ->references('id')->on('exercises')
            ->onDelete('cascade');

            $table->string('answer')->default('Пусто');

            $table->string('picture_path')->default('Пусто');

            $table->string('audio_path')->default('Пусто');

            $table->boolean('is_correct')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
