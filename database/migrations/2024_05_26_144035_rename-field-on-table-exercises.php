<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     public function up()
     {
         Schema::table('exercises', function(Blueprint $table) {
             $table->renameColumn('exercise_id', 'exercise_type_id');
         });
     }
 
 
     public function down()
     {
         Schema::table('exercises', function(Blueprint $table) {
             $table->renameColumn('exercise_type_id', 'exercise_id');
         });
     }
 
};
