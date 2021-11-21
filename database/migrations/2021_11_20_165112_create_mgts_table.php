<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMgtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mgts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_uid');
            $table->foreign('student_uid')->references('id')->on('students')->onDelete('cascade');          
            $table->unsignedBigInteger('session_uid');  
            $table->foreign('session_uid')->references('id')->on('sessions')->onDelete('cascade');           
            $table->unsignedBigInteger('dept_uid');
            $table->foreign('dept_uid')->references('id')->on('departments')->onDelete('cascade'); 
            $table->unsignedBigInteger('optional_uid'); 
            $table->foreign('optional_uid')->references('id')->on('optionls')->onDelete('cascade'); 
            $table->unsignedBigInteger('stream_uid'); 
            $table->foreign('stream_uid')->references('id')->on('streams')->onDelete('cascade'); 
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
        Schema::dropIfExists('mgts');
    }
}
