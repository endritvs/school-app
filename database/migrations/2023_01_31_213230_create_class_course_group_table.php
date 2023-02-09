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
        Schema::create('class_course_group', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')
            ->references('id')->on('class')
            ->onDelete('cascade');
            $table->foreignId('course_id')
            ->references('id')->on('course')
            ->onDelete('cascade');
            $table->dateTime('date_start');
            $table->dateTime('date_end');
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
        Schema::dropIfExists('class_course_group');
    }
};
