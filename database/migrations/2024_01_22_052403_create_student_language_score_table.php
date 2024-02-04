<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentLanguageScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_language_score', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('exam_type');
            $table->string('speaking_score');
            $table->string('reading_score');
            $table->string('writing_score');
            $table->string( 'listening_score');
            $table->string('average_score');
            $table->string('exam_date');
            $table->string('status');
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
        Schema::dropIfExists('student_language_score');
    }
}
