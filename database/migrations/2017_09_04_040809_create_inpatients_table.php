<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInpatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inpatients', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('skills');
            $table->string('admit_type');
            $table->string('admit_time');
            $table->string('medicine');
            $table->string('ward_no');
            $table->string('room_no');
            $table->integer('doctor_id')->unsigned();
            $table->integer('staff_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('restrict');
            $table->foreign('staff_id')->references('id')->on('doctors')->onDelete('restrict');
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
        Schema::dropIfExists('inpatients');
    }
}