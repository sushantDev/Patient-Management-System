<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('staff_type');
            $table->string('username');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->integer('age');
            $table->date('dob');
            $table->enum('gender', [ 'Female', 'Male', 'Others'])->nullable();
            $table->enum('marital_status', [ 'Unmarried', 'Married'])->nullable();
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
        Schema::dropIfExists('staff');
    }
}
