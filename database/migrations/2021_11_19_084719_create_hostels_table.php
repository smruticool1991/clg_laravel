<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_hostel_uid');
            $table->foreign('student_hostel_uid')->references('id')->on('students')->onDelete('cascade');
            $table->string('hostel_name')->nullable();
            $table->integer('floor')->nullable();
            $table->string('room')->nullable();
            $table->string('res_day')->nullable();
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
        Schema::dropIfExists('hostels');
    }
}
