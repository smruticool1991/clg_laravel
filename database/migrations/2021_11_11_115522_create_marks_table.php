<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_mark_uid');
            $table->foreign('student_mark_uid')->references('id')->on('students')->onDelete('cascade');
            $table->string('sub_1');
            $table->string('sub_2');
            $table->string('sub-3');
            $table->string('sub-4');
            $table->string('sub-5');
            $table->string('sub-6');
            $table->string('sub-7');
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
        Schema::dropIfExists('marks');
    }
}
