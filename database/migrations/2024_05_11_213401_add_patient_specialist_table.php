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
        Schema::create('patient_specialist', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('specialist_id');
            $table->foreign('specialist_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('patient_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_specialist');
    }
};
