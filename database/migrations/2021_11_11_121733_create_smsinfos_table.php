<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smsinfos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_sms_uid');
            $table->foreign('student_sms_uid')->references('id')->on('students')->onDelete('cascade');
            $table->biginteger('sms_no');
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
        Schema::dropIfExists('smsinfos');
    }
}
