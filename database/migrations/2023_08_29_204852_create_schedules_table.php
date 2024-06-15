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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('class1');
            $table->string('class2');
            $table->string('class3');
            $table->string('class4');
            $table->string('class5');
            $table->string('class6');
            $table->string('class7');
            $table->string('class8');
            $table->string('class9');
            $table->string('class10');
            $table->string('class11');
            $table->string('class12');
            $table->string('class13');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};