<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAcademicInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_academic_info', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('school_name');
            $table->string('street_name');
            $table->string('country');
            $table->string('province_state');
            $table->string('zipcode');
            $table->string('city');
            $table->string('passed_year');
            $table->string('level_of_study');
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
        Schema::dropIfExists('student_academic_info');
    }
}
