<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreignId('student_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreignId('course_id')
            ->references('id')->on('course')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_groups');
    }
};
