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
        Schema::create('exercise_types', function (Blueprint $table2) {
            $table2->id();
            $table2->string('name');
            $table2->string('description');
            $table2->timestamps();
        });

        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            // идентификатор типа упражнения
            $table->unsignedBigInteger('exercise_id')->nullable();
            $table->foreign('exercise_id')
            ->references('id')->on('exercise_types')
            ->onDelete('set null');
            // название упражнения
            $table->string('name')->default('Название упражнения не задано');
            // текст задания
            $table->string('description')->default('Текст упражнения не задан');
            // озвучка текста задания
            $table->string('task_voiceover_path')->nullable();

            // озвучка звука для задания типа "повтори звук/слог/слово"
            
            $table->string('sound_path')->nullable();
            // озвучка сигнала для задания типа "повтори звук/слог/слово"
            $table->string('signal_path')->nullable();

            // // время вдоха для задания типа "дыхание"
            // $table->integer('inhale')->unsigned()->nullable();
            // // время выдоха для задания типа "дыхание"
            // $table->integer('exhalation')->unsigned()->nullable();
            // // время паузы для задания типа "дыхание"
            // $table->integer('pause')->unsigned()->nullable();

            // ответы для задания типа "выбери ответ"
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
        Schema::dropIfExists('exrcise_types');
    }
};
