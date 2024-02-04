<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorageSubcriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_subcription', function (Blueprint $table) {
            $table->id();
            $table->integer('agent_id');
            $table->integer('insitution_id');
            $table->string('type');
            $table->string('balance_storage');
            $table->string('remaining_storage');
            $table->string('package_price');
            $table->string('transcation_id');
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
        Schema::dropIfExists('storage_subcription');
    }
}
