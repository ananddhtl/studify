<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('institution_id');
            $table->string('country');
            $table->string('universirty_name');
            $table->string('univ_img');
            $table->string('thumbnail');
            $table->string('location');
            $table->string('univ_type');
            $table->string('founded');
            $table->string('international_student');
            $table->string('type');
            $table->string('about_heading');
            $table->string('about_paragraph');
            $table->string('status');
            $table->string('video');
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
        Schema::dropIfExists('institution_detail');
    }
}
