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
        Schema::create('sounds', function (Blueprint $table2) {
            $table2->increments('id');
            $table2->string('description');
            $table2->string('audio_path');
            $table2->timestamps();
        });

        Schema::create('exercises', function (Blueprint $table) {
            $table->id();

            $table->integer('task_id')->unsigned()->nullable();
            $table->integer('sound_id')->unsigned()->nullable();
            $table->integer('signal_id')->unsigned()->nullable();

            $table->foreign('task_id')
            ->references('id')->on('sounds')
            ->onDelete('set null');

            $table->foreign('sound_id')
            ->references('id')->on('sounds')
            ->onDelete('set null');

            $table->foreign('signal_id')
            ->references('id')->on('sounds')
            ->onDelete('set null');

            $table->integer('exhalation')->unsigned()->nullable();
            $table->integer('inhale')->unsigned()->nullable();
            $table->integer('pause')->unsigned()->nullable();
            $table->json('answers')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
        Schema::dropIfExists('sounds');
    }
};
