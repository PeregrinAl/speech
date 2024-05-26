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
        Schema::table('exercises', function (Blueprint $table) {
            $table->tinyInteger('inhale')->nullable();
            $table->tinyInteger('exhalation')->nullable();
            $table->tinyInteger('pause')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->text('inhale')->nullable();
            $table->text('exhalation')->nullable();
            $table->text('pause')->nullable();
        });
    }
};
