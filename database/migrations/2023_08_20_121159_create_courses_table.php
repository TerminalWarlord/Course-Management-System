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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_title');
            $table->string('course_code');
            $table->string('version');
            $table->string('level');
            $table->string('semester');
            $table->string('credit_hours');
            $table->string('session');
            $table->string('contact_hours');
            $table->string('type')->default('Core');
            $table->string('counseling_time');
            $table->string('room_no');
            $table->string('instructors_email');
            $table->string('phone_no');
            $table->longText('rationale');
            $table->mediumText('section');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};