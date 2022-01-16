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
            $table->unsignedBigInteger('mgts_uid');
            $table->foreign('mgts_uid')->references('id')->on('mgts')->onDelete('cascade');
            $table->unsignedBigInteger('semester_uid');
            $table->foreign('semester_uid')->references('id')->on('semesters')->onDelete('cascade');
            $table->string('sub_1');
            $table->string('sub_2');
            $table->string('sub_3');
            $table->string('sub_4');
            $table->string('sub_5');
            $table->string('sub_6')->nullable();
            $table->string('sub_7')->nullable();
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
